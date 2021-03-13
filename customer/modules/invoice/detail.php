<?php  
$id=$_GET['id'];
$sql="SELECT invoice.*, invoice_detail.id_Product, invoice_detail.Quantity, invoice_detail.Price,Product.Name,Product.image FROM ((invoice INNER JOIN invoice_detail ON invoice_detail.id_Invoice = invoice.id_Invoice) 
			INNER JOIN Product ON Product.Id_Product = invoice_detail.id_Product) WHERE invoice.id_Invoice='$id'";
$result=mysqli_query($conn,$sql);
if ($result==false) {
	die("Loi:".mysqli_error($conn));
}	
?>
<?php 
$title="Lich su mua hang || Chun Garden";
require_once ('layout/headerCus.php');
?>
<div class="invoice_detail">
	<div class="checkout">
		<a href='index.php?module=invoice&action=history'><i class="fas fa-arrow-left"></i></a>
	</div>
	
	<h1>Chi tiết đơn hàng</h1>
	<table >
		<tr>
			<th>Ảnh sản phẩm </th>
			<th>Tên sản phẩm</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
		<tr>
			<?php  
				if(mysqli_num_rows($result)==0){
					echo"<tr>
					<th colspan='4'>Không có hóa đơn</th></tr>";
				}
				foreach ($result as $row) {
					echo "<tr>";
						// $id=$row['id_Invoice'];	
						// echo "<td>".$id."</td>";							
						// echo "<td>".date_format(date_create($row['Create_at']),'d-m-Y H:i:s')."</td>";
						// //thông tin người nhận
						// echo "<td>".$row['Receiver']."<br>".$row['Phone_Receiver']."<br>".$row['Recipient_Address']."</td>";
						$url=$row['image'];
						//ảnh sản phẩm
						echo "<td>";
						echo "<img src='$url' width='100px'>";
						echo "</td>";
						// //tên sản phẩm
						echo "<td>".$row['Name']."</td>";
						//đơn giá
						echo "<td>".number_format($row['Price'],0,",",".")."₫</td>";
						//số lượng
						echo "<td>".$row['Quantity']."</td>";
						//thành tiền
						echo "<td>".number_format($row['Price']*$row['Quantity'],0,",",".")."₫</td>";	
						// //trạng thái đơn hàng
						// echo "<td>";
						// 	$array_status= array (0 =>"đang chờ duyệt", 1 =>"xác nhận đơn hàng", 2 =>"đã bị hủy");
						// 	echo $array_status[$row['Status_Order']];
						// 	if($row['Status_Order']==0){
						// 		echo "<button><a href='index.php?module=invoice&action=cancel_order&id=$id'> Hủy </a></button>";
						// 	}
						
					echo "</tr>";
			
				}
				
			?>
		</tr>
	</table>
	<div class="check_total">
		<h3>Tổng tiền : <?php echo number_format($row['Total_Payment'],0,",","." ) ?>₫</h2>
	</div>
</div>
<?php  
require_once ('layout/footerCus.php');
?>