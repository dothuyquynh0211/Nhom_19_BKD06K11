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
</head>
<body>
	<h2 style="color: green"><?php echo $error; ?></h2>
<form method="POST">
	<input type="text" name="PhoneOrEmail" required placeholder="Phone or Email">
	<br><br>
	<input type="password" name="pw" required placeholder="Password">
	<br>
	<br> 
	<button type="submit" name="btnLogin">Login</button>
</form>
</body>
</html>