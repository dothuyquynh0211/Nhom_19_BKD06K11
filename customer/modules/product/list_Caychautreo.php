<?php 
$title="Caychau treo || Chun Garden" ;
require_once ('layout/headerCus.php');
?>

<?php  
$sql="SELECT id_Product, Name,Price,image FROM Product WHERE id_Categorize=8 ";
$kw="";
if(isset($_GET['kw'])){
	$kw=$_GET['kw'];
	$sql.="AND Name LIKE '%$kw%' ";
}
//phân trang
$sqli="SELECT COUNT(`id_Product`) AS 'tongSp' FROM product WHERE id_Categorize=8 AND Name LIKE '%$kw%'";
$kq = mysqli_query($conn,$sqli);
$row = mysqli_fetch_assoc($kq);
$tong_sp =$row['tongSp'];//tong san pham co trong database
$limit =12;
$tongPages=ceil($tong_sp/$limit);
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}
if($page >$tongPages){
	$page=$tongPages;
}
if($page <1){
	$page=1;
}
$offset=($page-1)*$limit;
$sql=$sql."LIMIT $offset,$limit ";
//
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
	.box{
		box-shadow: none;
	}
</style>

	<div class="search">
		<form class="content_search">
			<input type="hidden" name="module" value="product">
			<input type="hidden" name="action" value="list_Caychautreo">
			<input type="text" name="kw" placeholder="Bạn cần tìm kiếm...">
			<button type="submit" ><i class="fas fa-search"></i></button>
			</form>
	</div>
	
	<div class="box"><h2>Cây chậu treo</h2>
		<table>
			<?php 
				$total=mysqli_num_rows($result);
				if(!empty($kw)) echo "<h3> Có tất cả $tong_sp kết quả tìm kiếm : $kw </h3>";
				$count=0;
				$n=4;
				while($count != $total){
					echo "<tr>";
						while ($row=mysqli_fetch_assoc($result)) {
							$count++;
							$id=$row['id_Product'];
							echo "<td class='item'>";
								echo "<a href='index.php?module=product&action=view&id=$id'>";
									$url=$row['image'];
									echo "<img src='$url' width='200px'>";
									echo "<br><b>".$row['Name']."</b><br>";
									$price =$row['Price'];
									$pricer=number_format("$price",0,",",".");
                  					echo "<b class='gia'>".$pricer."₫</b>";
								echo "</a>";
							echo "</td>";
							if($count %$n==0) break;
						}
					echo "</tr>";

				}
			?>
		</table>
	</div>
	<div class="pagination">
		<a href="index.php?module=product&action=list_Caychautreo<?php if(!empty($kw)) echo "&kw=$kw"; echo "&page=".($page-1);?>"><i class="far fa-arrow-alt-circle-left"></i></a>
	<span><?php echo $page;?></span>
	<a href="index.php?module=product&action=list_Caychautreo&<?php if(!empty($kw)) echo "&kw=$kw"; echo "&page=".($page+1);?>"><i class="far fa-arrow-alt-circle-right"></i></a>
	</div>
<?php  
require_once ('layout/footerCus.php');
?>