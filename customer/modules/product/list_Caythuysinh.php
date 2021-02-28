<?php 
$title="Cay thuy sinh || Chun Garden" ;
require_once ('layout/headerCus.php');
?>

<?php  
$sql="SELECT id_Product, Name,Price,image FROM Product WHERE id_Categorize=6 ";
$kw="";
if(isset($_GET['kw'])){
	$kw=$_GET['kw'];
	$sql.="AND Name LIKE '%$kw%' ";
}
//phân trang
$sqli="SELECT COUNT(`id_Product`) AS 'tongSp' FROM product WHERE id_Categorize=6 AND Name LIKE '%$kw%'";
$kq = mysqli_query($conn,$sqli);
$row = mysqli_fetch_assoc($kq);
$tong_sp =$row['tongSp'];//tong san pham co trong database
$limit =3;
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

	<div class="search">
		<form class="content_search">
			<input type="hidden" name="module" value="product">
			<input type="hidden" name="action" value="list_Caythuysinh">
			<input type="text" name="kw" placeholder="Bạn cần tìm kiếm...">
			<button type="submit" ><i class="fas fa-search"></i></button>
			</form>
	</div>
	<h3>Cây thủy sinh</h3>
	<div class="box">
		<table>
			<?php 
				$total=mysqli_num_rows($result);
				if(!empty($kw)) echo "<h2> Có tất cả $tong_sp kết quả tìm kiếm cho $kw </h2>";
				$count=0;
				$n=3;// 3sp trên 1 hàng
				while($count != $total){
					echo "<tr>";
						while ($row=mysqli_fetch_assoc($result)) {
							$count++;
							$id=$row['id_Product'];
							echo "<td class='item'>";
								echo "<a href='index.php?module=product&action=view&id=$id'>";
									$url=$row['image'];
									echo "<img src='$url' width='200px'>";
									echo "<p>".$row['Name']."<p>";
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
	<div>
	<a href="index.php?module=product&action=list_Caymini<?php if(!empty($kw)) echo "&kw=$kw"; echo "&page=".($page-1);?>"><</a>
	<span><?php echo $page;?></span>
	<a href="index.php?module=product&action=list_Caymini<?php if(!empty($kw)) echo "&kw=$kw"; echo "&page=".($page+1);?>">></a>
	</div>

<?php  
require_once ('layout/footerCus.php');
?>