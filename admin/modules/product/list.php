

<?php  
$sql="SELECT id_Product, Name, Price,image,Status FROM Product ORDER BY id_Product DESC";
if(isset($_GET['kw'])){
	$kw=$_GET['kw'];
	$sql="SELECT id_Product, Name, Price,image,Status FROM Product WHERE Name LIKE '%$kw%'";
}
$result = mysqli_query($conn,$sql);
if($result == false){
	echo "Loi: ".mysqli_error($conn);
	mysqli_close($conn);
	die();		
}
?>
<?php 
$title="Sản Phẩm" ; 
require_once 'Layout/header.php';
?>
<style type="text/css">
	.list_product_admin{
		padding: 15px;


	}
	.list_product_admin table{
		width: 100%;
		margin-top: 20px;
		text-align: center;
		border-spacing: 35px;

	}
	.list_product_admin a{
		color: green;
		text-decoration: none; 
		border: 1px solid green; 
		padding: 5px;
		float: right;
	}
	.list_product_admin th{
		font-size: larger;

	}
	#name{
		text-align: left;
		display: inline;
	}
	#name p{
		font-size: 18px;
		padding: 10px 0;
	}
	.list_product_admin table tr{
		margin-top:  10px ;
		border-bottom: 1px solid green; 
	}
	.list_product_admin table,tr,th,td{
		border-collapse: collapse;
		
	}
	.list_product_admin td img{
		width: 100px;
		height: 100px;
		margin: 10px 0;
	}
	.list_product_admin table tr td a{
		color: blue;
		border :none;
	}
	.fa-trash-alt{
		color: red;
	}
	.content_search input{
      width: 250px;
      height: 30px;
      border:1px solid green;
      border-radius: 10px;
      outline: none;
      padding-left: 10px;

    }
    .content_search button{
      margin-left: 5px;
      color: green;
      border: none;
      font-size: larger;
      background: white;
    }
.search{
  margin-top: 30px;
  text-align: center;
}
	</style>
	<div class="search">
		<form class="content_search" >
			<input type="hidden" name="module" value="product">
			<input type="hidden" name="action" value="list">
			<input type="text" name="kw" placeholder="Bạn cần tìm kiếm...">
			<button type="submit" name="btnSearch"><i class="fas fa-search"></i></button>
			</form>
	</div>
<div class="list_product_admin">
	
<h1>Danh sách sản phẩm</h1>
<br>

<a href="index.php?module=product&action=insert" >Thêm sản phẩm</a>
<br>
<br>
<table>
	<tr>
		<th>Mã</th>
		<th>Ảnh </th>
		<th>Tên</th>
		<th>Gía</th>
		<th>Kho</th>
		<th colspan="2"></th>
		<th></th>
	</tr>
	<tr>
		<?php 
			$total=mysqli_num_rows($result);
			if(isset($kw)) echo "<h2> Có tất cả $total kết quả tìm kiếm cho $kw </h2>";
			if(mysqli_num_rows($result)==0){
				echo"<tr>
				<th colspan='8'>Danh sach trong</th></tr>";
			}
			else{
				foreach ($result as $row) {
					echo "<tr>";
					$id =$row['id_Product'];
					echo "<td>".$id."</td>";
					echo "<td>";
						$url=$row['image'];
						echo "<img src='$url'>";
					echo "</td>";
					echo "<td id='name'><p>".$row['Name']."</p></td>";
						$price =$row['Price'];
						$pricer=number_format("$price",0,",",".");
					echo "<td>".$pricer."₫</td>";
					echo "<td>";
						$arrStatus = array(0 => 'Hết hàng',1=>'Còn hàng',2=>'Hàng sắp về' );
						$status = $row['Status'];
						echo $arrStatus[$status];
					echo "</td>";
					echo "<td>";
						echo "<a href='index.php?module=product&action=edit&id=$id'><i class='far fa-edit'></i> </a>";
					echo "</td>";	
					echo "<td>";
						echo "<a href='index.php?module=product&action=delete&id=$id'> <i class='far fa-trash-alt'></i> </a>";
					echo "</td>";
					echo "<td>";
						echo "<a href='index.php?module=product&action=view_product&id=$id'> <i class='far fa-eye'></i> </a>";
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