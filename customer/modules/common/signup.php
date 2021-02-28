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
	else{
		echo $error = "loi: ".mysqli_error($conn);
	}
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
		<button type="submit" name="btnSignup">Dang ki</button>
	</form>

</body>
</html>