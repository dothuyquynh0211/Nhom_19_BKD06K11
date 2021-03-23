<?php  
$name = $sdt = $pw = $error ="";
if(isset($_POST['btnSignup'])){
	$name = $_POST['Name'];
	$sdt = $_POST['Phone'];
	$add = $_POST['address'];
	$email = $_POST['email'];
	$pw = md5($_POST['pass']);
	$pw2 = md5($_POST['pass2']);
	$anh="../public/avt_cus/customer.png";


	$sql= "INSERT INTO customer VALUES (null,'$name','$sdt','$email','$add','$anh','$pw')";
	$result = mysqli_query($conn,$sql);
	if ($result == true) {
		echo "Đăng kí thành công !";
		$_SESSION['id_Cus']=mysqli_insert_id($conn);
		$_SESSION['signup']= $name;
		$_SESSION['avt']= $anh;
		header("Location:index.php?module=common&action=login");
	}
	// else{
	// 	echo $error = "loi: ".mysqli_error($conn);
	// }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dang Ki</title>
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
			/*opacity: 75%;*/
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
					<h2>Đăng kí</h2>
					<form method="POST" >
						<div class="input_box">
							<input type="text" name="Name" placeholder="Tên" required>
						</div>						
						<div class="input_box">
							<input type="text" name="Phone" placeholder="Số điện thoại" required >
						</div>
						<div class="input_box">
							<input type="text" name="address" placeholder="Địa chỉ" required>
						</div>
						<div class="input_box">
							<input type="email" name="email" placeholder="Email" required>
						</div>
						<div class="input_box">
							<input type="password" name="pass" placeholder="Mật khẩu" required>
						</div>
						<div class="input_box">
							<input type="password" name="pass2" placeholder="Nhập lại mật khẩu" required >
						</div>
						<div class="input_box">
							<input type="submit" name="btnSignup" value="Sign up">
						</div>
						<p class="forget"><a href="index.php?module=common&action=login">Đăng nhập</a></p>
						<p class="forget">Quên mật khẩu ? <a href="">Tại đây</a></p>
					</form>
				</div>
			</div>
		</div>
	<!-- 
	 -->
	</section>

</body>
</html>