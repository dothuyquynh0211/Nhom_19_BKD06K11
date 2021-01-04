<?php  
$name = $sdt = $pw = $error ="";
if(isset($_POST['btn'])){
	$name = $_POST['Name'];
	$sdt = $_POST['Phone'];
	$add = $_POST['address'];
	$email = $_POST['email'];
	$pw = md5($_POST['pass']);
	$pw2 = md5($_POST['pass2']);
	$conn = mysqli_connect("localhost","root","","bkd06k11");
	if(!$conn)
	{
		die("Ket noi that bai".mysqli_connect_error($conn));
	}
	$sql= "INSERT INTO customer VALUES (null,'$name','$sdt','$email','$add','$pw')";
	$result = mysqli_query($conn,$sql);
	if ($result == true) {
		mysqli_close($conn);
		header("Location: login.php");

	}
	else{
		echo $error = "loi: ".mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dang Ki</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Trang dang ki tài khoản</h2>
	<form method="POST">
		<input type="text" name="Name" placeholder="Name" required>
		<br>
		<input type="text" name="Phone" placeholder="Phone" required>
		<br>
		<input type="text" name="address" placeholder="Address" required>
		<br>
		<input type="email" name="email" placeholder="Email" required>
		<br>
		<input type="password" name="pass" placeholder="Password" required>
		<br>
		<input type="password" name="pass2" placeholder="Nhập lại pasword" required>
		<br>
		<button type="submit" name="btn">Dang ki</button>
	</form>

</body>
</html>