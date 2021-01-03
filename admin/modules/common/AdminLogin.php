<?php 
$error = "Đăng nhập để tiếp tục!" ;
if(isset($_POST['btn'])){
	$user = $_POST['user'];
	$email = $_POST['email'];
	$pw = md5($_POST['pw']);
	//require_once 'connect.php';
	$sql = "SELECT id, name FROM admin WHERE name='$user' AND pass='$pw' AND email = '$email'";
	$result = mysqli_query($conn,$sql);
	if ($result==false) {
		$error = mysqli_error($conn);
	}
	else{
		if (mysqli_num_rows($result)==1) {
			// lưu thông tin vào SESSION
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user']['id'] = $row['id'];
			$_SESSION['user']['pw'] = $row['pw'];
			//chuyển hướng về trang Home
			header("Location=index.php?module=product&action=list");
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
	<input type="text" name="user" required placeholder="Name">
	<br><br>
	<input type="text" name="email" required placeholder="Email">
	<br><br>
	<input type="password" name="pw" required placeholder="Password">
	<br>
	<br> 
	<button type="submit" name="btn">Login</button>
</form>
</body>
</html>