<?php 
$title="Cay de ban || Chun Garden" ;
require_once ('layout/headerCus.php');
?>

<?php  
$sql="SELECT id_Product, Name,Price,image FROM Product ";
if(isset($_GET['kw'])){
	$kw=$_GET['kw'];
	$sql.="WHERE Name LIKE '%$kw%' ";
}
$result=mysqli_query($conn,$sql);
if($result==false){
	echo "Loi: ".mysqli_error($conn);
	mysqli_close($conn);
	die();
}
else{

}
?>

<style type="text/css">
	.list_caydeban{
		padding: 16px;
	}
	.list_caydeban{
		margin: auto;
		text-align: center;
	}
	.list_caydeban table{
		width:100%;
	}
	.list_caydeban table .item {
		text-align: center;
		box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
	}
	.list_caydeban table .item:hover {
		box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
	}
</style>
<div class="content">
	<div class="search">
		<form class="content_search">
			<input type="hidden" name="module" value="product">
			<input type="hidden" name="action" value="list_Caydeban">
			<input type="text" name="kw" placeholder="Bạn cần tìm kiếm...">
			<button type="submit" ><i class="fas fa-search"></i></button>
			</form>
	</div>
	<h3>Cây để bàn</h3>
	<div class="list_caydeban">
		<table>
			<?php 
				$total=mysqli_num_rows($result);
				if(isset($kw)) echo "<h2> Có tất cả $total kết quả tìm kiếm cho $kw </h2>";
				$count=0;
				$n=3;
				while($count != $total){
					echo "<tr>";
						while ($row=mysqli_fetch_assoc($result)) {
							$count++;
							$id=$row['id_Product'];
							echo "<td class='item'>";
								echo "<a href='index.php?module=product&action=detail&id=$id'>";
									$url=$row['image'];
									echo "<img src='$url' width='200px'>";
									echo "<br><b>".$row['Name']."</b><br>";
									echo "<b>".$row['Price']."VND</b>";
								echo "</a>";
							echo "</td>";
							if($count %$n==0) break;
						}
					echo "</tr>";

				}
			?>
		</table>
	</div>
</div>
<?php  
require_once ('layout/footerCus.php');
?>