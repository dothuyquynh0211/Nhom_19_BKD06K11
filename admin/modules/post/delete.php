<?php 
if (isset($_GET['id'])) {
 	$id=$_GET['id'];
 	$sql="DELETE FROM Post WHERE id_Post='$id'";
 	$result=mysqli_query($conn,$sql);
 	if ($result==false) {
 		echo "Loi : ".mysqli_error($conn);
 	}
 	else{
 		header("Location:index.php?module=post&action=list");
 	}
} 
?>