<?php 

$error = "" ;
if(isset($_POST['btn'])){
	$user = $_POST['user'];
	$email = $_POST['email'];
	$pw = md5($_POST['pw']);
	$sql = "SELECT id_Admin,Name FROM Admin WHERE Name='$user' AND Email = '$email' AND Pass='$pw' ";
	$result = mysqli_query($conn,$sql);
	if ($result==false) {
		$error=mysqli_error($conn);
	}
	else{
		if (mysqli_num_rows($result)==1) {
			// lưu thông tin vào SESSION
			$row = mysqli_fetch_assoc($result);
			$_SESSION['admin']['id'] = $row['id_Admin'];
			$_SESSION['admin']['name'] = $row['Name'];
			//chuyển hướng về trang Home
			header('Location:index.php?module=product&action=list');
		}
		else{
			$error = "Tài khoản không hợp lệ !";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<style>
		*{
			padding: 0;
			margin: auto;
			border-collapse: collapse;
			box-sizing: border-box;

		}
		body{
			background: url(img/bgrLoginAdmin.jpg) no-repeat;
			background-size: 100% 655px;
		}
		#container{
			width: 855px;
			height: 300px;
			margin: auto;
			position: relative;
			top:160px;
		}	
		#right-content{
			float: left;
		}
		#login{						
			border-left:2px solid green;
			width: 400px;
			height: 300px;
			float:left;
			padding-left: 50px;
			text-align: center;			
		}
		#login input{
			font-size: 20px;
			width: 270px;
			height: 35px;
			outline: none;
			border : 1px solid green;
			padding-left: 20px;
			border-radius: 5px;
			margin-bottom: 10px;
		}
		#login p{
			display: inline-block;
			float: left;
			padding-left: 40px;			
			margin: 0 ;
			font-style: italic;
		}
		#login button{
			text-align: center;
			width: 200px;
			height: 40px;			
			border-radius: 10px;
			background: lightgreen;
			color: white;
			font-size: 20px;
			border: none;
			font-style: italic;
			outline: none;


		}
		#login button:hover{
			background: #0BA61D;
			transition: background 0.6s;

		}
	</style>
</head>
<body>
	<div id="container">
		<div id="right-content"> 
			<img src="img/logo-removebg-preview.png" alt="logo" width="350px" height="300px">
		</div>
		<div id="login">
			<h1 style="color: green; font-style: italic;" >Đăng nhập hệ thống</h1>
			<p style="color: red"><?php echo $error; ?></p>
			<br>
			<form method="POST">
				<p>Name</p>
				<br>
				<input type="text" name="user" required >
				<br>
				<p>Email</p>
				<br>
				<input type="text" name="email" required >
				<br>
				<p>Password</p>
				<br>
				<input type="password" name="pw" required >
				<br>
				<br> 
				<button type="submit" name="btn">Login</button>
			</form>
		</div>
	</div>
</body>
</html>