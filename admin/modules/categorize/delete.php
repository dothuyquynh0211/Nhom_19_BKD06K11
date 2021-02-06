<?php 
if (isset($_GET['id'])) {
 	$id=$_GET['id'];
 	$sql="DELETE FROM Categorize WHERE id_Categorize='$id'";
 	$result=mysqli_query($conn,$sql);
 	if ($result==false) {
 		echo "Loi : ".mysqli_error($result);
 	}
 	else{
 		header("Location:index.php?module=categorize&action=list");
 	}
 } 

?>