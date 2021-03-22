<?php  
	if(isset($_SESSION['id_Cus'])){
		$name=$_SESSION['signup'];		
		$error="";
		if(isset($_POST['btnUpdate'])){
			$user = $_POST['user'];
			$email=$_POST['email'];
			$old_pw = md5($_POST['old_pw']);
			$new_pw = md5($_POST['new_pw']);
			$sql = "SELECT id_Customer,Username FROM Customer WHERE Username='$user' AND Email = '$email'OR Phone='$email' AND Pass='$old_pw' LIMIT 1 ";
			$result = mysqli_query($conn,$sql);
			if ($result==false) {
				$error=mysqli_error($conn);
			}
			else{
				if (mysqli_num_rows($result)==1) {
					//update mật khẩu mới
					$sql = "UPDATE Customer SET Pass='$new_pw'";
					$result = mysqli_query($conn,$sql);
					echo "Thay đổi mật khẩu thành công ! ";
				}
				else{
					$error = "Tài khoản hoặc mật khẩu không hợp lệ !";
				}
			}
		}
	}
	else{
		echo $error="Bạn phải đăng nhập !";
	}
?>
<?php 
$title="Password || Chun Garden" ;
require_once ('layout/headerCus.php');
?>
<div class="change_pass">
	<h1 style="color: green;">Đổi mật khẩu</h1>
	<p style="color: red"><?php echo $error; ?></p>
	<form method="POST">
		<p>Tên tài khoản</p>
		<input type="text" name="user" required >
				
		<p>Email hoặc Số điện thoại</p>
				
		<input type="text" name="email" required >
				
		<p>Mật khẩu hiện tại</p>
		<input type="password" name="old_pw" required >
		<p>Mật khẩu mới</p>
		<input type="password" name="new_pw" required >
		<br> 
		<button type="submit" name="btnUpdate">Cập nhật</button>
	</form>
</div>
<div class="checkout">
	<a href="index.php?module=common&action=setting"><i class="fas fa-arrow-left"></i></a>
</div>
	
<?php  
require_once ('layout/footerCus.php');
?>