<?php
	$id=$_GET['id'];

	$sql="SELECT invoice_detail.*, Product.Name,Product.image FROM invoice_detail  JOIN Product ON Product.Id_Product = invoice_detail.id_Product WHERE id_Invoice='$id'";
	$result=mysqli_query($conn,$sql);	
	if($result==false){
		echo "Loi: ".mysqli_error($conn);
	}
	else{
		//header("Location:index.php?module=invoice&action=listinvoice");
	}

?>
<style type="text/css">
.invoice_detail {
  width: 100%;
  margin-top: 20px;
  /*margin-left: 10px;*/
  /*overflow: hidden;*/
}
.invoice_detail table{
  margin-top: 20px;
  width: 100%;
  text-align: center;
}
.invoice_detail table th{
  font-size: larger;
  border-bottom: 2px solid green;
}
.invoice_detail table tr td{
  padding: 10px 0;
  border-bottom: 1px solid grey;
}
.check_total h3{
  margin-top: 10px;
   margin-bottom: 10px;
}
.checkout {
    margin-right: 20px;
    text-align: left;
    float: left;
  }
  .checkout a i{
    font-size: 30px;
    color: green;
    margin-left: 30px;
  }
</style>
<?php  
$title="Chi tiet hoa don";
require_once 'Layout/header.php';
?>
<div class="invoice_detail">
	<div class="checkout">
		<a href='index.php?module=invoice&action=listinvoice'><i class="fas fa-arrow-left"></i></a>
	</div>
	
	<h1>Chi tiết đơn hàng</h1>
	<table>
		<tr>
			<th>Ảnh sản phẩm</th>
			<th> Tên sản phẩm </th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>			
		</tr>
		<tr>
			<?php
			$total=0;  
			foreach ($result as $row) {
				echo "<tr>";				
				$url=$row['image'];
				echo "<td>";
				echo "<img src='$url' width='100px'>";
				echo "</td>";
				echo "<td>".$row['Name']."</td>";

				echo "<td>".number_format($row['Price'],0,",",".")."₫</td>";
				echo "<td>".$row['Quantity']."</td>";

				echo "<td>".number_format($row['Price']*$row['Quantity'],0,",",".")."₫</td>";
				$total +=$row['Price']*$row['Quantity'];
				echo "</tr>";
			}

			?>
		</tr>
	</table>
	<div class="check_total">
	<h3>Tổng tiền tất cả : <?php echo number_format("$total",0,",",".");?>₫</h3>
	
	</div>
</div>
<?php  
require_once 'Layout/footer.php';
?>