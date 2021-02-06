<?php 
if (isset($_GET['id'])) {
 	$id=$_GET['id'];
 	$sql1="DELETE FROM product_images where id_Product='$id'";
 	mysqli_query($conn,$sql1);
 	$sql2="DELETE FROM Product WHERE id_Product='$id'";
 	$result=mysqli_query($conn,$sql2);
 	if ($result==false) {
 		echo "Loi : ".mysqli_error($conn);
 	}
 	else{
 		header("Location:index.php?module=product&action=list");
 	}
} 
else{
	header("Location:index.php?module=product&action=list");
}

?>