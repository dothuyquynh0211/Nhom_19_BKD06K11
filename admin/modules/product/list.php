
<?php 

if(!isset($_SESSION['admin'])){
	header("Location:index.php?modules=common&action=AdminLogin");
}
?>
<?php 
$title="Product" ; 
require_once 'Layout/header.php';
?>
<div>
<h1>Danh sach san pham tai day</h1>

</div>

<?php  
require_once 'Layout/footer.php';
?>