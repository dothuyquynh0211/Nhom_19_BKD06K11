<?php  
$name="";
if (isset($_POST['btn'])) {
	$name= $_POST['Name'];
	$sql = "INSERT INTO Categorize VALUES (null,'$name')";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Loi: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=categorize&action=list");
	}
}
?>

<?php  
$title="Invoice";
require_once 'Layout/header.php';
?>
<style type="text/css">
	.pl form{
		font-size: 20px;
		padding: 20px 20px;
	}
	input{

	}
</style>
<div class="pl">
	<h1>Danh sách phân loại tại đây</h1>
	<form method="POST">
		<p>Tên loại cây</p>
		<input type="text" name="Name" required >
		<button type="submit" name="btn">Thêm</button>
	</form>

</div>

<?php  
require_once 'Layout/footer.php';
?>