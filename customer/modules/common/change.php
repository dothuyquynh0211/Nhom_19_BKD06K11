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
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>thông tin tài khoản</h1>
	<div>Tên tài khoản : <?php  echo $name ;?></div>
	<div>
		<h2>Đổi mật khẩu</h2>
		<p style="color: red"><?php echo $error; ?></p>
		<form method="POST">
				<p>Tên tài khoản</p>
				<input type="text" name="user" required >
				
				<p>Email or Phone</p>
				
				<input type="text" name="email" required >
				
				<p>mật khẩu cũ</p>
				<input type="password" name="old_pw" required >
				<p>mật khẩu mới</p>
				<input type="password" name="new_pw" required >
				<br> 
				<button type="submit" name="btnUpdate">update</button>
			</form>
	</div>
	<a href="index.php?module=common&action=setting">trở lại</a>
</body>
</html>