<?php 

if(!isset($_SESSION['admin'])){
	header("Location:index.php?modules=common&action=AdminLogin");
}
?>

<?php  
$title="Invoice";
require_once 'Layout/header.php';
?>
<div>
<h1>Danh sach hoa don tai day</h1>
<table border="1px" width="100%">
	<tr>
		<th>Thời gian</th>
		<th>Trạng thái</th>
		<th>Thông tin người đặt</th>
		<th>Thông tin người nhận</th>
		<th >Thay đổi tình trạng</th>
		<th>Chi tiết</th>
	</tr>
	<tr>
		<?php  
			$sql="SELECT invoice.*, customer.Username, customer.Phone, customer.Address FROM invoice JOIN customer ON customer.id_Customer = invoice.id_cus ORDER BY id_Invoice DESC" ;
			$result=mysqli_query($conn,$sql);
			if($result == false){
				echo "Loi: ".mysqli_error($conn);
			}
			else if(mysqli_num_rows($result)==0){
				echo"<tr>
				<th colspan='6'>Danh sach trong</th></tr>";
			}
			foreach ($result as $row) {
				echo "<tr>";
					$id=$row['id_Invoice'];			
					echo "<td>".date_format(date_create($row['Create_at']),'d-m-Y H:i:s')."</td>";
					echo "<td>";
						if($row['Status_Order']==0){
							echo "Đang chờ duyệt";
						}
						else if($row['Status_Order']==1){
							echo "Đã duyệt";
						}
						else if($row['Status_Order']==2){
							echo "Đã hủy";
						}
					echo "</td>";
					echo "<td>".$row['Username']."<br>".$row['Phone']."<br>".$row['Address']."</td>";
					echo "<td>".$row['Receiver']."<br>".$row['Phone_Receiver']."<br>".$row['Recipient_Address']."</td>";				
					echo "<td>";
						if($row['Status_Order']==0){
							echo "<a href='index.php?module=invoice&action=update_status&id=$id&status=1'> Duyệt </a>";
							echo "<a href='index.php?module=invoice&action=update_status&id=$id&status=2'> Hủy </a>";
						}
						
					echo "</td>";
					
					echo "<td>";
						echo "<a href='index.php?module=invoice&action=view_detail&id=$id'>xem chi tiết </a>";
					echo "</td>";
				echo "</tr>";
		
			}
			
		?>
	</tr>
</table>
</div>

<?php  
require_once 'Layout/footer.php';
?>