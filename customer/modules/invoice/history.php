<?php  
$id=$_SESSION['id_Cus'];
$sql="SELECT invoice.*, customer.Username, customer.Phone, customer.Address FROM invoice JOIN customer ON customer.id_Customer = invoice.id_cus ORDER BY id_Invoice DESC" ;
$result=mysqli_query($conn,$sql);
if ($result==false) {
	die("Loi:".mysqli_error($conn));
}	
?>
<?php 
$title="Lich su mua hang || Chun Garden";
require_once ('layout/headerCus.php');
?>
<h1>Lịch sử mua hàng</h1>
<table border="1px" width="100%">
	<tr>
		<th>Mã hóa đơn</th>
		<th>Thời gian</th>
		<th>Thông tin người nhận</th>
		<!-- <th>Sản phẩm</th>
		<th>ảnh sản phẩm</th>
		<th>Đơn giá</th>
		<th>số lượng</th>
		<th>Tổng tiền</th> -->
		<th >Trạng thái</th>
	</tr>
	<tr>
		<?php  
			if(mysqli_num_rows($result)==0){
				echo"<tr>
				<th colspan='4'>Không có hóa đơn</th></tr>";
			}
			foreach ($result as $row) {
				echo "<tr>";
					$id=$row['id_Invoice'];	
					echo "<td>"."<a href='index.php?module=invoice&action=detail&id=$id'>".$id."</a>"."</td>";							
					echo "<td>".date_format(date_create($row['Create_at']),'d-m-Y H:i:s')."</td>";
					//thông tin người nhận
					echo "<td>".$row['Receiver']."<br>".$row['Phone_Receiver']."<br>".$row['Recipient_Address']."</td>";
					// //tên sản phẩm
					// echo "<td>".$row['Name']."</td>";
					// $url=$row['image'];
					// //ảnh sản phẩm
					// echo "<td>";
					// echo "<img src='$url' width='100px'>";
					// echo "</td>";
					// //đơn giá
					// echo "<td>".$row['Price']."</td>";
					// //số lượng
					// echo "<td>".$row['Quantity']."</td>";
					// //tổng tiền
					// echo "<td>".$row['Total_Payment']."</td>";	
					//trạng thái đơn hàng
					echo "<td>";
						$array_status= array (0 =>"đang chờ duyệt", 1 =>"xác nhận đơn hàng", 2 =>"đã bị hủy");
						echo $array_status[$row['Status_Order']];
						if($row['Status_Order']==0){
							echo "<button><a href='index.php?module=invoice&action=cancel_order&id=$id'> Hủy </a></button>";
						}
					
				echo "</tr>";
		
			}
			
		?>
	</tr>
</table>
<a href='index.php?module=common&action=setting'>back</a>
<?php  
require_once ('layout/footerCus.php');
?>