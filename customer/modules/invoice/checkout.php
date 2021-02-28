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
		//header("Location:index.php?module=invoice&action=cart");
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
<div>
	<a href="index.php?module=invoice&action=cart"><---</a>
	<!-- <h2>Thanh toán</h2>
	<h3>
		ảnh,tên sp, giá,số lượng,
		lưu ý cho người bán,tổng tiền
	</h3>
	------------------ -->
	<h2>Thông tin người nhận </h2>
	<?php
	$id_Cus=$_SESSION['id_Cus'];
	$sql="SELECT * FROM Customer WHERE id_Customer = '$id_Cus'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	?>
	<form method="POST">
		tên <input type="text" name="receiver" value="<?php echo $row['Username'] ?>"><br>
		sdt <input type="text" name="phone" value="<?php echo $row['Phone'] ?>"><br>
		dia chi <input type="text" name="address" value="<?php echo $row['Address'] ?>"><br>
		<button type="submit" name="btnBuy"> Dat Hàng 	</button>
	</form>
</div>
<?php 
if (isset($_POST['btnBuy'])) {
 	Echo "Đat hang thanh công.";
 	echo "<a href='index.php?module=invoice&action=history'>xem lịch sử mua hàng</a>";
 } ?>
<?php  
require_once ('layout/footerCus.php');
?>