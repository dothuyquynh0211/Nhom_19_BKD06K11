<?php 
$module = $action = "";
if (isset($_GET['module'])) {
	$module = $_GET['module'];
}
if (isset($_GET['action'])) {
	$action = $_GET['action'];
}
if ($module == "" || $action =="") {
	$module = "common";
	$action ="AdminLogin";
}
//kiem tra duong dan co hop le hay khong 
$path ="modules/$module/$action.php";
if(file_exists($path)==true){
	require_once ('config/connect.php');
	require_once ('config/session.php');
	require_once ($path);
	require_once ('config/close.php');
}
else{
	$path = "modules/common/404.php";
	require_once($path);
}
?>