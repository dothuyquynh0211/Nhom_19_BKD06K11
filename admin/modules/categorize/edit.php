<?php  
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql="SELECT * FROM Categorize WHERE id_Categorize='$id'";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
	 	echo "Loi : ".mysqli_error($result);
	}
	else if(mysqli_num_rows($result)==1){
	 	$row=mysqli_fetch_assoc($result);
	 	$name=$row['Name'];
	}
}
if (isset($_POST['btn'])) {
	$name= $_POST['Name'];
	$sql = "UPDATE Categorize SET Name='$name' WHERE id_Categorize='$id'";
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
	.p1{
		text-align: center;
	}
	.pl form{
		font-size: 20px;
		padding: 20px 20px;
	}
	input{
		padding-left: 10px;
		height: 30px;
		border-radius: 5px;
	}
	button{
		text-align: center;
		width: 100px;
		height: 30px;			
		border-radius: 10px;
		background: lightgreen;
		color: white;
		border: none;
		font-style: italic;
		outline: none;
	}
</style>
<div class="pl">
	<h2>Cập nhật danh sách phân loại </h2>
	<form method="POST">
		<p>Tên loại cây</p>
		<input type="text" name="Name" value="<?php echo $name; ?>" >
		<br>
		<br>
		<button type="submit" name="btn">Cập nhật</button>
	</form>

</div>

<?php  
require_once 'Layout/footer.php';
?>