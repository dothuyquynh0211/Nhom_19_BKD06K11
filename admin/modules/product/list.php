<?php  
if(!isset($_SESSION['user'])){
	header("Location:AdminLogin.php");
}
?><!DOCTYPE html>
<html>
<head>
	<title>List</title>
</head>
<body>
<h1>Danh sach</h1>
<a href="index.php?module=common&action=AdminLogout">LogOut
</a>
</body>
</html>