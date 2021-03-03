<?php 
$error = "Đăng nhập để tiếp tục!" ;
if(isset($_POST['btnLogin'])){
	$buyer = $_POST['PhoneOrEmail'];
	$pw = md5($_POST['pw']);
	//require_once 'connect.php';
	$sql = "SELECT id_Customer,Username FROM customer WHERE Phone='$buyer' OR Email = '$buyer' AND Pass='$pw' ";
	$result = mysqli_query($conn,$sql);
	if ($result==false) {
		$error=mysqli_error($conn);
	}
	else{
		if (mysqli_num_rows($result)==1) {
			// lưu thông tin vào SESSION
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id_Cus'] = $row['id_Customer'];
			$_SESSION['signup'] = $row['Username'];
			//chuyển hướng về trang Home
			header("Location:index.php?module=home&action=home");
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
		section{
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			/*background:linear-gradient(to bottom,#f1f4f9,#dff1ff);*/
		}
		section .color{
			position: absolute;
			filter: blur(150px);
		}
		section .color:nth-child(1){
			top: -350px;
			width: 600px;
			height: 600px;
			background-color: #ff359b;
		}
		section .color:nth-child(2){
			bottom: 0px;
			left: 100px;
			width: 400px;
			height: 300px;
			background-color: orange;
		}
		section .color:nth-child(3)
		{
			bottom: 50px;
			
			width: 350px;
			height: 350px;
			background-color: #00d2ff;
		}
		section .color:nth-child(4){
			bottom: -50px;
			right: 20px;
			width: 330px;
			height:500px;
			background-color: lightgreen;
		}
		.box{
			position: relative;
		}
		.box .square{
			position: absolute;

			box-shadow: 0px 25px 45px rgba(0,0,0,0.1);
			border: 1px solid rgba(255,255,255,0.5);
			border-right: 1px solid rgba(255,255,255,0.2);
			border-bottom: 1px solid rgba(255,255,255,0.2);
			background: rgba(255,255,255,0.2);
			border-radius: 10px;
			animation: animate 10s linear infinite;
			-moz-animation: animate 10s infinite;
    		-webkit-animation: animate 10s infinite;
    		-o-animation: animate 10s infinite;
			animation-delay: calc(-1s * var(--i));
		}
		@keyframes animate
		{
			0%{
				transform: translateY(-40px);
			}
			50%{
				transform: translateY(70px);
			}
			100%{
				transform: translateY(-40px);
			}
		}
		.box .square:nth-child(1){
			top: -50px;
			right: -60px;
			width: 90px;
			height: 90px;
			

		}
		.box .square:nth-child(2){
			top: 100px;
			left: -130px;
			width: 60px;
			height: 60px;
			z-index: 0;
			background: rgba(255,255,255,0.02);
			
		}
		.box .square:nth-child(3){
			bottom: 170px;
			left: -70px;
			width: 80px;
			height: 80px;

			
		}.box .square:nth-child(4){
			top: 40px;
			right: -140px;
			width: 50px;
			height: 50px;
			
		}
		.box .square:nth-child(5){
			top: 230px;
			left: -230px;
			width: 130px;
			height: 130px;
			background: rgba(255,255,255,0);
			
		}
		.container{
			position: relative;
			width: 400px;
			min-height: 400px;
			background: rgba(255,255,255,0.1);
			border-radius: 10px;
			display: flex;
			justify-content: center;
			align-items: center;
			opacity: 75%;
			box-shadow: 0px 25px 45px rgba(0,0,0,0.1);
			border: 1px solid rgba(255,255,255,0.5);
			border-right: 1px solid rgba(255,255,255,0.1);
			border-bottom: 1px solid rgba(255,255,255,0.1);
		}
		.form{
			position: relative;
			width: 100%;
			height: 100%;
			padding: 30px;
			z-index: 2;
		}
		.form h2{
			position: relative;
			color: #fff;
			font-size: 34px;
			margin-top:0px;
			letter-spacing: 1px;

		}
		.form h2::before{
			content: '';
			position: absolute;
			left: 0;
			bottom: -10px;
			width: 80px;
			height: 3px;
			background: #fff;
		}
		.form input{
			width: 100%;
			margin-top: 20px;
		}
		.form .input_box input{
			width: 340px;
			background: rgba(255,255,255,0.3);
			border: none;
			outline: none;
			padding: 10px ;
			border-radius: 35px;
			border-right: 1px solid rgba(255,255,255,0.5);
			border-bottom: 1px solid rgba(255,255,255,0.5);
			border: 1px solid rgba(255,255,255,0.5);
			letter-spacing: 1px;
			font-size: 12px;
			color: black;
			box-shadow: 0px 5px 15px rgba(0,0,0,0.05);
		}
		.form .input_box input::placeholder{
			color:#585858;
		}
		.form .input_box input[type='submit']{
			color: green;
			background: rgba(255,255,255,0.6);
			font-weight:bold;
			width: 100%;
			cursor: pointer;
			align-items: center;
		}
		.form .input_box input[type='submit']:hover{
			background: white;
			transition: background 0.4s;
		}
	</style>
</head>
<body>
	<section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			<div class="square" style="--i:5;"></div>
			<div class="container">
				<div class="form">
					<h2>Login Form</h2>
					<form method="POST">
						<div class="input_box">
							<input type="text" name="PhoneOrEmail" placeholder="Phone or Email" required>
						</div>						
						<div class="input_box">
							<input type="password" name="pw" placeholder="Password" required>
						</div>
						<div class="input_box">
							<input type="submit" name="btnLogin" value="Login">
						</div>
						<p class="forget">Forgot password ? <a href="">Click Here</a></p>
						<p class="forget"> Don't have an account?<a href="index.php?module=common&action=signup">Sign up</a></p>						
					</form>
				</div>
			</div>
		</div>
	<!-- 
	 -->
	</section>
</html>