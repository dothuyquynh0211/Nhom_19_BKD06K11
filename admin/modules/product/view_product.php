<?php 
if(isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql="SELECT product.*,product_images.URL FROM `product` JOIN product_images ON product_images.id_Product=product.id_Product WHERE product.id_Product='$id'";
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
require_once ('Layout/header.php');
?>
  <div class="wraper_detail_product">
  	<h1>Chi tiết sản phẩm</h1>
  	<div class="img_detail_Product">
  		<div class="main_picture">
  			<img src="<?php echo $url ?>" width='300px' heigh='150px'>
  		</div>
  		<div class="secondary_picture">
        <?php  
        foreach ($result as $key => $value) {
          $url2=$value['URL'];

          echo "<img src='$url2' alt='anh phu' style='max-height: 100px; max-width: 250px;'>";
          //<img src="<?php echo $value['URL'];" alt="ảnh phụ" style="max-height: 100px; max-width: 250px;">         
       } 
       ?>
      </div>
  		
  	</div>
  	<div class="inf_product">
  		<h3><?php  echo $name ; ?></h3>
  		<p>Gía: <?php echo $price ; ?></p>
  		<p>
  			Mô tả : <?php  echo $dess ?>
  		</p>
  	</div>
    <div class="shopping-carts">
      <a href="index.php?module=product&action=edit&id=<?php echo $id ?>"><button>Sửa sản phẩm</button></a>
    </div>
    <div class="invoice">
      <a href="index.php?module=product&action=delete&id=<?php echo $id ?>"><button>Xóa sản phẩm</button></a>
    </div>
  </div>
<?php  
require_once ('Layout/footer.php');
?>