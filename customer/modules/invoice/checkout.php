<?php
if(isset($_SESSION['id_Cus'])){
	if (isset($_POST['btnBuy'])) {
		$id_Cus=$_SESSION['id_Cus'];
		$total_payment=$_SESSION['total'];
		$cus=$_POST['receiver'];
		$phone=$_POST['phone'];
		$addr=$_POST['address'];
		$status=0; //chờ xử lý
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date= date("Y-m-d H:i:s");

		$sql="INSERT INTO invoice VALUES (null,'$id_Cus','$cus','$phone','$addr','$date','$total_payment','$status',NULL)";
		$result=mysqli_query($conn,$sql);
		//lấy ra hóa đơn có mã lớn nhất
		$sql="SELECT max(id_Invoice) FROM invoice ";
		$result=mysqli_query($conn,$sql);
		$row= mysqli_fetch_array($result);

		$code=$row['max(id_Invoice)'];

		foreach ($_SESSION['cart'] as $id => $quantity) {
			$sql="SELECT Price FROM product WHERE id_Product='$id' ";
			$result=mysqli_query($conn,$sql);
			$each= mysqli_fetch_array($result);
			$price =$each['Price'];
			$sql="INSERT INTO invoice_detail VALUES ('$code','$id','$quantity','$price')";
			$result=mysqli_query($conn,$sql);
		}	
		//cập nhật xong giỏ hàng thì xóa hết các sản phẩm trong giỏ hàng
		unset($_SESSION['cart']);
		unset($_SESSION['total']);
		// header("Location:index.php?module=invoice&action=cart");
	}
}
else{
	header("Location:index.php?module=common&action=login");
}

?>
<?php 
$title="Thanh toán || Chun Garden" ;
require_once ('layout/headerCus.php');
?>
<div class="checkout">
	<a href="index.php?module=invoice&action=cart"><i class="fas fa-arrow-left"></i></a>
	<!-- <h2>Thanh toán</h2>
	<h3>
		ảnh,tên sp, giá,số lượng,
		lưu ý cho người bán,tổng tiền
	</h3>
	------------------ -->
	<h2>Thông tin thanh toán </h2>
	<?php
	$id_Cus=$_SESSION['id_Cus'];
	$sql="SELECT * FROM Customer WHERE id_Customer = '$id_Cus'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	?>
	<form method="POST">
		<table>
			<tr>
				<th>Tên *</t>
				<td><input type="text" name="receiver" value="<?php echo $row['Username'] ?>"></td>
			</tr>
			<tr>
				<th>Số điện thoại *</th>
				<td><input type="text" name="phone" value="<?php echo $row['Phone'] ?>"></td>
			</tr>
			<tr>
				<th>Địa chỉ *</th>
				<td><input type="text" name="address" value="<?php echo $row['Address'] ?>"></td>
			</tr>
			<tr>
				<th>Thông tin bổ xung</th>
				<td><textarea name="" id="" cols="35" rows="5" placeholder="Ghi chú đơn hàng....."></textarea></td>
			</tr>
		</table>
		<?php if(!empty($_SESSION['cart'])) {?>
		<button type="submit" name="btnBuy" > Đặt hàng 	</button>
	<?php } ?>
	</form>
</div>
<div class="detail-checkout">
	<h2>Đơn hàng của bạn</h2>
	<table>
		<?php 
		if(isset($_SESSION['cart'])){
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
			 			echo "<div class='inf_detail'>";			 				
			 				echo "<img src='$url' >";
			 				echo "<div>";
			 					echo "<strong>".$name."</strong><br>";
			 					echo "<p> Số lượng : ".$quantity."</p><br>";
			 				echo "</div>";
			 			echo "</div>";
			 			echo "</td>";
			 			$total=($price*$quantity);
			 			$total=number_format("$total",0,",",".");
			 			echo "<td>".$total."₫</td>";
			 			
			 			$total_payment += ($price*$quantity);
			 		echo "</tr>";		 		
			 	}
			}
		}
		else{
			echo "<div class=check_success>";
			echo "<h2>Đặt hàng thành công ! </h2>";
 			// echo "<br><a href='index.php?module=invoice&action=history'>xem lịch sử mua hàng</a>";
 			echo "</div>";
		} 
		?>
	</table>
	<div class="check_total">
		<h3>Tổng tiền : <?php echo number_format($total_payment) ?>₫</h2>
	</div>
</div>
<?php  
require_once ('layout/footerCus.php');
?>