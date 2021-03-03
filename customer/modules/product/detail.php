<?php 
if(isset($_GET['id'])) {
	$Id=$_GET['id'];
	$sql="SELECT product.*,product_images.URL FROM `product` JOIN product_images ON product_images.id_Product=product.id_Product WHERE product.id_Product='$Id'";
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
<script>
  function changeImg(id){
    let = imgPath = document.getElementById(id).getAttribute('src');
    document.getElementById('main_pic').setAttribute('src',imgPath);
  }
</script>
  <div class="wraper_detail_product">
    <h3 style="color: grey">Trang chủ/ Cây để bàn</h3>
  	<div class="img_detail_Product">
  		<div class="main_picture">
  			<img src="<?php echo $url ?>" id="main_pic">
  		</div>
  		<div class="secondary_picture">
      <?php  
        echo "<img src='$url' onclick='changeImg(id)' id='0'>";
        foreach ($result as $key => $value) {
          $key++;
          $url2=$value['URL'];
          echo "<img src='$url2' onclick='changeImg(id)' id='$key'>";
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
      <div class="shopping-carts">
        <a href="index.php?module=invoice&action=cart&id=<?php echo $Id ?>&up"><button>thêm vào giỏ hàng</button></a>
      </div>
      <div class="invoice">
        <a href="index.php?module=invoice&action=cart&id=<?php echo $Id ?>&up"><button>mua ngay</button></a>
      </div>
  	</div>
    
  </div>
<?php  
require_once ('layout/footerCus.php');
?>