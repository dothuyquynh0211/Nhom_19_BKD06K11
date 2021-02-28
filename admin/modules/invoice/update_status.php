<?php 

	$id = $_GET['id'] ;
	$status=$_GET['status'];
	$sql="UPDATE invoice SET Status_Order ='$status' WHERE id_Invoice='$id' ";
		$result=mysqli_query($conn,$sql);
		
		if($result==false){
			echo "Loi: ".mysqli_error($conn);
		}
		else{
			header("Location:index.php?module=invoice&action=listinvoice");
		}

?>