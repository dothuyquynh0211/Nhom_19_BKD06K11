<?php 
if(!isset($_SESSION['cart'])){
	$_SESSION['cart']= array();	
}
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	//tang, giam so luong
	if (isset($_SESSION['cart'][$id])) {
		if(isset($_GET['up'])){
			$_SESSION['cart'][$id] +=1;
		}
		if(isset($_GET['down'])){
			$_SESSION['cart'][$id] -=1;
			if($_SESSION['cart'][$id]<0){
				$_SESSION['cart'][$id]=0;

			}
		}
		
	}
	else{
		$_SESSION['cart'][$id]=1;
	}
	//xoa san pham khoi gio hang
	if(isset($_GET['delete'])){
		unset($_SESSION['cart'][$id]);
	}

	header("Location:index.php?module=invoice&action=cart");
	die();
}
?>


<?php  
$title = "Giỏ hàng";
require_once ('layout/headerCus.php');
?>
<style>
	table{
		width: 100%;
	}
	table ,th, tr ,td{
		border: 1px solid black;
	}
</style>
<div class="cart">
	<table>
		<tr>
			<th>STT</th>
			<th>Sản phẩm</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
			<th>Action</th>
		</tr>
		<?php 
		$count=0;
		$total_payment=0;
		foreach ($_SESSION['cart'] as $id => $quantity) {
			$count +=1;
			
		 	$sql="SELECT Name, Price, image FROM Product WHERE id_Product='$id'";
		 	$result= mysqli_query($conn,$sql);
		 	if ($result == false) {
		 		echo "Loi: ".mysqli_error($conn);
		 	}
		 	else if(mysqli_num_rows($result)==1){
		 		$row=mysqli_fetch_assoc($result);
		 		$name =$row['Name'];
		 		$url=$row['image'];
		 		$price = $row['Price'];
		 		echo "<tr>";
		 			echo "<td>".$count."</td>";
		 			echo "<td>";
		 				echo $name."<br>";
		 				echo "<img src='$url' width='100px'>";
		 			echo "</td>";
		 			echo "<td> $price</td>";

		 			echo "<td> ";
		 				echo "<a href='index.php?module=invoice&action=cart&id=$id&down'><button class='btn_quantity'> - </button></a>";
		 				echo $quantity;
		 				echo "<a href='index.php?module=invoice&action=cart&id=$id&up'><button class='btn_quantity'> + </button></a>";
		 			echo "</td>";
		 			echo "<td>".($price*$quantity)."</td>";
		 			$total_payment += ($price*$quantity);
		 			echo "<td>";
		 				echo "<a href='index.php?module=invoice&action=cart&id=$id&delete'>Xóa</a>";
		 			echo "</td>";
		 		echo "</tr>";		 		
		 	}
		 }
		 echo "<tr>";
		 	echo "<th colspan='4'>Tổng tiền </th>";
		 	echo "<th>".number_format($total_payment)."</th>";
		 echo "</tr>";

		?>
	</table>
</div>
<?php  
require_once ('layout/footerCus.php');
?>