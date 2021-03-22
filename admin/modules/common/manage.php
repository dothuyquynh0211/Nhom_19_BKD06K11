<?php  
	if(isset($_SESSION['admin'])){
		$name=$_SESSION['admin']['name'];
		
		$error="";
		if(isset($_POST['btnUpdate'])){
			$user = $_POST['user'];
			$email=$_POST['email'];
			$old_pw = md5($_POST['old_pw']);
			$new_pw = md5($_POST['new_pw']);
			$sql = "SELECT id_Admin,Name FROM Admin WHERE Name='$user'AND Email = '$email' AND Pass='$old_pw' LIMIT 1 ";
			$result = mysqli_query($conn,$sql);
			if ($result==false) {
				$error=mysqli_error($conn);
			}
			else{
				if (mysqli_num_rows($result)==1) {
					//update mật khẩu mới
					$sql = "UPDATE Admin SET Pass='$new_pw'";
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


<?php 
$title="Bài viết" ; 
require_once 'Layout/header.php';
?>
<style type="text/css">
	.change_pass{
  /*text-align: center;*/
  margin-top: 20px;
  padding-left: 30px;
  /*width: 400px;
      height: 300px;*/
}
.change_pass h2{
font-size: 20px;
}
.change_pass form{
  margin-top: 20px;
}
/*.change_pass form p{

  float: left;
  padding-left: 50px;    
}*/
.change_pass form input{
  font-size: 20px;
  width: 270px;
  height: 35px;
  outline: none;
  border : 1px solid green;
  padding-left: 20px;
  border-radius: 5px;
  margin-bottom: 15px;

}
.change_pass button{
  text-align: center;
      width: 100px;
      height: 40px;     
      border-radius: 10px;
     /* background: lightgreen;*/
      
      font-size: 20px;
      border: none;
      outline: none;
    }
.change_pass button:hover{
      background: #0BA61D;
      color: white;
      transition: background 0.6s;
}
.change_pass h1 {
	color: green;

}
.name{
	margin: 10px;
	font-size: 20px;
}
</style>
<div class="change_pass">
	<h1>Thông tin tài khoản</h1>
	<div class="name"> <?php  echo $name ;?></div>
	<div>
		<h2>Đổi mật khẩu</h2>
		<p style="color: red"><?php echo $error; ?></p>
		<form method="POST">
				<p>Tên</p>
				<input type="text" name="user" required >				
				<p>Email</p>				
				<input type="text" name="email" required >				
				<p>Mật khẩu cũ</p>
				<input type="password" name="old_pw" required >
				<p>Mật khẩu mới</p>
				<input type="password" name="new_pw" required >
				<br> 
				<button type="submit" name="btnUpdate">Cập nhật</button>
		</form>
	</div>
	
</div>
<?php  
require_once 'Layout/footer.php';
?>