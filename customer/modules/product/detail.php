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
    $status=$row['Status'];
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
  <div class="wrapper_detail_product">
  	<div class="img_detail_Product">
  		<div class="main_picture">
  			<img src="<?php echo $url ?>" id="main_pic">
  		</div>
  		<div class="secondary_picture">
      <?php  
       echo "<div class='pic'>";
        echo "<img src='$url' onclick='changeImg(id)' id='0'>";
        echo "</div>";
        foreach ($result as $key => $value) {
          $key++;
          $url2=$value['URL'];
          echo "<div class='pic'>";
          echo "<img src='$url2' onclick='changeImg(id)' id='$key'>";
           echo "</div>";       
       } 
       ?>  
      </div>  		
  	</div>
  	<div class="inf_product">
  		<h2><?php  echo $name ; ?></h3>
      <div class="inf_product_price">
        <p><?php echo number_format("$price",0,",",".") ?>₫</p>
      </div> 
      <div class="inf_product_dess">
        <?php 
          $array_status= array (0 =>"Hết hàng", 1 =>"Còn hàng", 2 =>"Hàng sắp về");
              echo $array_status[$status];
        ?>
      </div>	
      <?php  if($status==1){?>
      <div class="add">
        <br>
         <a href="index.php?module=invoice&action=cart&id=<?php echo $Id ?>&up"><button>Mua ngay</button></a>
        <a href="index.php?module=invoice&action=cart&id=<?php echo $Id ?>&up"><button>Thêm vào giỏ </button></a>
      </div>
    <?php } ?>
      <div class="inf_product_dess">
        <h3>Mô tả</h3>
        <p><?php  echo $dess ?></p>
      </div>
  	</div>   
  </div>
<?php  
require_once ('layout/footerCus.php');
?>