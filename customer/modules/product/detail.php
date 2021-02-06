<?php 
if(isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql="SELECT * FROM Product WHERE id_Product='$id'";
	$result=mysqli_query($conn,$sql);
	if($result==false){
		echo "Loi: ".mysqli_error($conn);
	}
	else if (mysqli_num_rows($result)==0){
		echo "<h2> Không tìm thấy chi tiết sản phẩm </h2>";
	}
	else{
		$row = mysqli_fetch_assoc($result);
		$name=$row['Name'];
		$price = $row['Price'];
		$dess=$row['Description'];
		$url=$row['image'];
	}
}
?>

<?php 
$title="Chi tiet san pham";
require_once ('layout/headerCus.php');
?>
  <div class="wraper_detail_product">
  	<h1>Chi tiết sản phẩm</h1>
  	<div class="img_detail_Product">
  		<div class="main_picture">
  			<img src="<?php echo $url ?>" width='300px' heigh='150px'>
  		</div>
  		<div class="secondary_picture"></div>
  		
  	</div>
  	<div class="inf_product">
  		<h3><?php  echo $name; ?></h3>
  		<p>Gía: <?php echo $price; ?></p>
  		<p>
  			Mô tả : <?php  echo $dess ?>
  		</p>
  	</div>
    <div class="shopping-carts">
      <a href="index.php?module=invoice&action=cart&id=<?php echo $id ?>"><button>thêm vào giỏ hàng</button></a>
    </div>
    <div class="invoice">
      <a href="index.php?module=invoice&action=cart&id=<?php echo $id ?>"><button>mua ngay</button></a>
    </div>
  </div>
<?php  
require_once ('layout/footerCus.php');
?>