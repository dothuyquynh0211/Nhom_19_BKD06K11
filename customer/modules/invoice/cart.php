<?php 
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array() ;	
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
			if($_SESSION['cart'][$id]<1){
				unset($_SESSION['cart'][$id]);

			}
		}
		
	}
	else{
		$_SESSION['cart'][$id]=1;
	}
	//xoa san pham khoi gio hang
	if(isset($_GET['delete'])){
		unset($_SESSION['cart'][$id]);
		header("Location:index.php?module=invoice&action=cart");
		die();
	}

	
}
?>


<?php  
$title = "Giỏ hàng";
require_once ('layout/headerCus.php');
?>

<div class="cart">
	<h2>Giỏ hàng</h2>
	<table>
		<tr>
			<th>Sản phẩm</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
			<th></th>
		</tr>
			<?php 
			$total_payment=0;
			foreach ($_SESSION['cart'] as $id => $quantity) {		
			 	$sql="SELECT id_Product,Name, Price, image FROM Product WHERE id_Product='$id'";
			 	$result= mysqli_query($conn,$sql);
			 	if ($result == false) {
			 		echo "Loi: ".mysqli_error($conn);
			 	}
			 	else if(mysqli_num_rows($result)==1){
			 		$row=mysqli_fetch_array($result);
			 		$name =$row['Name'];
			 		$url=$row['image'];
			 		$price = $row['Price'];
			 		$id_Pro=$row['id_Product'];
			 		echo "<tr>";
			 			echo "<td>";
			 			echo "<div class='inf'>";
			 				
			 				echo "<img src='$url' >";
			 				echo "<div>";
			 					echo "<p>".$name."</p><br>";
			 					$pricer=number_format("$price",0,",",".");
			 					echo "<span>".$pricer."₫</span>";
			 				echo "</div>";
			 			echo "</div>";
			 			echo "</td>";
			 			

			 			echo "<td> ";
			 			echo "<div class=btn_quantity>";
			 				echo "<a href='index.php?module=invoice&action=cart&id=$id&down'><i class='far fa-minus-square'></i></a>";
			 				echo $quantity ;
			 				echo "<a href='index.php?module=invoice&action=cart&id=$id&up'><i class='far fa-plus-square'></i></a>";
			 			echo "</div>";
			 			echo "</td>";
			 			$total=($price*$quantity);
			 			$total=number_format("$total",0,",",".");
			 			echo "<td>".$total."₫</td>";
			 			$total_payment += ($price*$quantity);
			 			$_SESSION['total']=$total_payment;
			 			echo "<td>";
			 				echo "<a href='index.php?module=invoice&action=cart&id=$id&delete' class='remove'><i class='far fa-times-circle'></i></a>";
			 			echo "</td>";
			 		echo "</tr>";		 		
			 	}

			}
		?>
	</table>
	<div class="total">
		<h2>Tổng tiền : <?php echo number_format("$total_payment",0,",","."); ?>₫</h2>
	</div>
	<div class="check">
	<?php  if (isset($id_Pro))  {
		echo "<a href='index.php?module=invoice&action=checkout'><button> Mua hàng </button></a>";		
	} ?>	
	</div>
	
	
</div>
<?php  
require_once ('layout/footerCus.php');
?>