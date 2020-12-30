<?php 
$module = $action = "";
if (isset($_GET['module'])) {
	$module = $_GET['module'];
}
if (isset($_GET['action'])) {
	$action = $_GET['action']
}
if ($module == ""||$action =="") {
	$module = "common";
	$action ="login";
}
//kiem tra duong dan co hop le hay khong 
$path ="modules/$module/$action.php";
if(file_exists($path)){
	require_once ('config/connect.php');
	require_once ($path);
	msqli_close($conn);
}
else{
	$path = "modules/common/404.php"
	require_once($path)
}
?>