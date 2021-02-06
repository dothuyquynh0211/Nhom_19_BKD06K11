<?php 
$module = $action = "";
if (isset($_GET['module'])) {
	$module = $_GET['module'];
}
if (isset($_GET['action'])) {
	$action = $_GET['action'];
}
if ($module == "" || $action =="") {
	$module = "home";
	$action ="home";
}
//kiem tra duong dan co hop le hay khong 
$path ="modules/$module/$action.php";
if(file_exists($path)==true){
	require_once ('cf/connectSQL.php');
	session_start();
	require_once ($path);
	require_once ('cf/closeConnect.php');
}
else{
	$path = "modules/common/error.php";
	require_once($path);
}
?>