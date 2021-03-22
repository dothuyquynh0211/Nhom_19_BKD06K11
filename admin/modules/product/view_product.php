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
<style>
  .wrapper_detail_product {
  width: 100%;
  margin-top: 20px;
  display: grid;
  grid-template-columns: 1fr 1.2fr;
}
 .wrapper_detail_product h1{
  margin-top: 20px;
 }
.img_detail_Product{
 display: flex;
 flex-direction: column;
 float: left;
 /*width: 50%;*/

}
.main_picture{
   width: 100%;
}
.main_picture img{
   width: 100%;
  height: 400px;
  float: left;

}
.secondary_picture {
 display: grid;
 grid-template-columns: repeat(4,1fr);
 column-gap: 0.5rem;
 margin: 0;
}
.secondary_picture {
  margin-top: 10px;
}
.secondary_picture .pic img{
  width: 100px;
  height: 100px;
  cursor: pointer;
  text-align: center;
}
.inf_product{
  border-right: 2px;
  float: left;
  margin:0;
text-align:left;
margin-left: 30px;
}
.inf_product h2{
font-size: 2rem;
line-height: 1.2;

}
.inf_product p{
  padding-top: 10px;
  padding-bottom:10px;
}
.inf_product_price{
  color:  #FF00BF;
  font-size: 20px;

  border-top:2px solid green;
}
.add{
  width: 100%;
}
.add a button{
  font-size: 18px;
  color: #fff;
  background: #3DA369;
  padding: 10px;
  outline: none;
  border-radius: 10px;
  border: none;
  margin-right: 15px;
}
.inf_product_dess{
  width: 100%; 
  position: relative;
}
.inf_product_dess h3 {
  color: green;
  font-size: 20px;
  margin-top: 20px;
}
.inf_product_dess h3:before{
  position: absolute;
  top: 25px;
  content: '';
  height: 2px;
  width: 30%;
  background: grey;
}
.inf_product_dess p{
  font-size: 20px;
}
</style>
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
  		<h2><?php  echo $name ; ?></h2>
      <div class="inf_product_price">
        <p><?php 
        echo number_format("$price",0,",","."); ?>₫</p>
      </div>
  		<div class="inf_product_dess">
        <h3>Mô tả</h3>
        <p><?php  echo $dess ?></p>
      </div>
  	</div>
    
  </div>
<?php  
require_once ('Layout/footer.php');
?>