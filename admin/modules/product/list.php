
<?php 

if(!isset($_SESSION['admin'])){
	header("Location:index.php?modules=common&action=AdminLogin");
}
?>
<?php 
$title="Product" ; 
require_once 'Layout/header.php';
?>
<style type="text/css">
		.list_product_admin{
		padding: 15px;

	}
	.list_product_admin table{
		width: 90%;
		text-align: center;

	}
	.list_product_admin table,tr,th,td{
		border: 1px solid green;
		border-collapse: collapse;
		
	}
	</style>
<div class="list_product_admin">
	
<h1 style="color: green">Danh sách sản phẩm</h1>
<br>

<a href="index.php?module=product&action=insert" style="text-decoration: none; border: 1px solid green; padding: 10px;">Thêm sản phẩm</a>
<br>
<br>
<table>
	<tr>
		<th>ID</th>
		<th>Tên</th>
		<th>Ảnh</th>
		<th>Gía</th>
		<th>Tình trạng</th>
		<th colspan="2">Action</th>
	</tr>
	<tr>
		<?php 
			$sql="SELECT id_Product, Name, Price,image,Status FROM Product";
			$result = mysqli_query($conn,$sql);
			if($result == false){
				echo "Loi: ".mysqli_error($conn);
			}
			else if(mysqli_num_rows($result)==0){
				echo"<tr>
				<th colspan='7'>Danh sach trong</th></tr>";
			}
			else{
				foreach ($result as $row) {
					echo "<tr>";
					$id =$row['id_Product'];
					echo "<td>".$id."</td>";
					echo "<td>".$row['Name']."</td>";
					echo "<td>";
						$url=$row['image'];
						echo "<img src='$url' width='80px'>";
					echo "</td>";
					echo "<td>".$row['Price']."</td>";
					echo "<td>";
						$arrStatus = array(0 => 'Hết hàng',1=>'Còn hàng',2=>'Hàng sắp về' );
						$status = $row['Status'];
						echo $arrStatus[$status];
					echo "</td>";
					echo "<td>";
						echo "<a href='index.php?module=product&action=edit&id=$id'> Edit </a>";
					echo "</td>";	
					echo "<td>";
						echo "<a href='index.php?module=product&action=delete&id=$id'> Delete </a>";
					echo "</td>";
					echo "</tr>";
				}
			}
		?>
	</tr>
	
</table>

</div>

<?php  
require_once 'Layout/footer.php';
?>