<?php  
unset($_SESSION['admin']);
session_destroy();
header("Location:index.php?module=common&action=AdminLogin");
?>s