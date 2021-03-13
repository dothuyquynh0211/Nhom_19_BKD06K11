<?php  
if(isset($_POST['btn'])){
	$name=$_POST['Name'];
	$price = $_POST['gia'];
	$status = $_POST['status'];
	$description=$_POST['description'];
	$id_Categorize=$_POST['categorize'];
	$view=0;
// 1 anh
	if(isset($_FILES['image'])){
		$file=$_FILES['image'];
		$file_name= $file['name'];
		$folder ="../public/images/";
		$url = $folder.$file_name;
		if($file['type']=="image/jpg" || $file['type']=="image/png" ||$file['type']=="image/jpeg"){
			move_uploaded_file($file['tmp_name'],$url);
		}
		else{
			echo "Không đúng định dạng";
			$file_name ="";
		}
	}
//ktra nhieu anh
	if(isset($_FILES['images'])){
		$files=$_FILES['images'];
		$file_names= $files['name'];

		if($file['type']=="image/jpg" || $file['type']=="image/png" ||$file['type']=="image/jpeg"){
			foreach ($file_names as $key =>$value) {
				$url2='../public/images/'.$value;
			move_uploaded_file($files['tmp_name'][$key],$url2);
			}
		}
		
		
	}
	$sql="INSERT INTO Product VALUES (null,'$name','$price','$url','$description','$status','$id_Categorize','$view')";
	$result=mysqli_query($conn,$sql);
	//lay ra id product		
	$id_Product=mysqli_insert_id($conn);
	
	foreach ($file_names as $key => $value) {
		$url2='../public/images/'.$value;
		$sqli="INSERT INTO product_images VALUES('$id_Product','$url2')";
		$resulti=mysqli_query($conn,$sqli);
		if($resulti==false){
		echo "Loi anh phu : ".mysqli_error($conn);
		}
	}
	if($result==false){
		echo "Loi: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=product&action=list");
	}
} 
?>

<?php  
$title="Thêm sản phẩm";
require_once 'Layout/header.php';
?>
<style type="text/css">

	.add_product{
  /*text-align: left;*/
  margin-top: 20px;  
  padding-left: 30px;
}
.add_product form label{
	font-size: larger;
}
.add_product form{
  margin-top: 30px;
}
.add_product form p{
  display: inline-block;
  float: left;
  padding-left: 50px;    
}
.add_product form input{
  font-size: 16px;
  width: 270px;
  height: 35px;
  
  padding-left: 10px;
  border-radius: 5px;
  margin-bottom: 15px;

}
.add_product form .img input{
	outline: none;
  border : 1px solid green;
}
.add_product form .sl{
	  font-size: 16px;
  width: 200px;
  height: 35px;
  border-radius: 5px;
}
.add_product button{
  text-align: center;
      width: 100px;
      height: 40px;     
      border-radius: 10px;
     /* background: lightgreen;*/
      
      font-size: 20px;
      border: none;
      outline: none;
      margin-bottom: 20px;
    }
.add_product button:hover{
      background: #0BA61D;
      color: white;
      transition: background 0.6s;
}
.left{
	float: left;
	width: 50%;
}
.right{
	float: left;
}
.foot{
	clear: both;
}
</style>
<script>
		function changePhoto(){
			let vPhoto = document.getElementById('img_preview');
			let vLink = document.getElementById('url_img');
			let vURL = URL.createObjectURL(vLink.files[0]);
			vPhoto.src = vURL;
		}
	</script>
<div class="add_product">
	<h1>Thêm sản phẩm </h1>
	<form method="POST" enctype="multipart/form-data">
		<div class="left">
		<label  class="img"> Tên sản phẩm <br>
			<input type="text" name="Name" required >
		</label>
		<br>
		<label  class="img" > Gía sản phẩm<br>
			<input type="text" name="gia" required >
		</label>
		<br>
		<label >Tình trạng<br>
			<select name="status" class="sl" >
				<option value="0">Hết hàng</option>
				<option value="1">Còn hàng</option>
				<option value="2">Hàng sắp về</option>
			</select>			
		</label>
		<br>
		<br>
		<label> Phân loại <br>
			<select name="categorize" class="sl">
				<?php  
					$sql="SELECT id_Categorize,Name FROM Categorize";
					$result=mysqli_query($conn,$sql);
					if($result == false){
						echo "Loi: ".mysqli_error($conn);
					}
					else if(mysqli_num_rows($result)>0){
						foreach ($result as $row) {
							$id=$row['id_Categorize'];
							echo "<option value=$id>";
								echo $row['Name'];
							echo "</option>";
						}						
					}
				?>	
			</select>			
		</label>
		</div>
		<div class="right">
			<label>
				<img src="img/thêm.jpg" id="img_preview" width="200px" height="200px;">
			</label>
			<br>		
			<label >Ảnh chính <br>  
				<input type="file" name="image" id="url_img" onchange="changePhoto()" >
			</label>
			<br>
			<label> Ảnh mô tả <br>
				<input type="file" name="images[]" multiple="multiple" >
			</label>
		</div>
		<br>
		<div class="foot">
		<label > Mô tả sản phẩm<br>
			<textarea cols="60" rows="10" name="description" id="description"></textarea>
		</label>
		<br></div>
		<button type="submit" name="btn">Thêm</button>
	</form>
</div>
<?php  
require_once 'Layout/footer.php';
?>