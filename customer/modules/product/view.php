<?php 
if(isset($_GET['id'])) {
	$id=$_GET['id'];
		$sql="SELECT id_Product,view FROM product WHERE id_Product='$id'";
	$result=mysqli_query($conn,$sql);
	
	if($result==false){
		echo "Loi view : ".mysqli_error($conn);
	}
	else if (mysqli_num_rows($result)==1){
		$row=mysqli_fetch_assoc($result);
		$view=$row['view'];
		$view ++;
		$sql="UPDATE Product SET view = '$view' WHERE id_Product='$id'";
		$result=mysqli_query($conn,$sql);
		//echo "view tăng";
		
	}
	header("Location:index.php?module=product&action=detail&id=$id");
}

?>