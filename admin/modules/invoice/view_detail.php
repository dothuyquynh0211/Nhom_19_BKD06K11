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

<div>
	<table>
		<tr>
			<th>Tên sản phẩm</th>
			<th> Ảnh sản phẩm </th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>			
		</tr>
		<tr>
			<?php
			$total=0;  
			foreach ($result as $row) {
				echo "<tr>";
				echo "<td>".$row['Name']."</td>";
				$url=$row['image'];
				echo "<td>";
				echo "<img src='$url' width='100px'>";
				echo "</td>";
				echo "<td>".$row['Price']."</td>";
				echo "<td>".$row['Quantity']."</td>";
				echo "<td>".$row['Price']*$row['Quantity']."</td>";
				$total +=$row['Price']*$row['Quantity'];
				echo "</tr>";
			}

			?>
		</tr>
	</table>
	<h1>Tổng tiền tất cả :</h1>
	<?php echo $total; ?>
</div>