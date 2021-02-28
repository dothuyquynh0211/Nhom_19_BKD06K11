<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'] ;
	$sql="UPDATE invoice SET Status_Order =2 WHERE id_Invoice='$id' ";
		$result=mysqli_query($conn,$sql);
		
		if($result==false){
			echo "Loi: ".mysqli_error($conn);
		}
		else{
			header("Location:index.php?module=invoice&action=history");
		}
}
?>