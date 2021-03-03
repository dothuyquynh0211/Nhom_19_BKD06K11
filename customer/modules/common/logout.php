<?php  
session_start();
unset($_SESSION['id_Cus']);
session_destroy();
header("Location:index.php?module=home&action=home");
?>