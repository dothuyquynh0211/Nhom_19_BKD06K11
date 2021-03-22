<?php  
if(isset($_GET['id'])){
	$id= $_GET['id'];
	$sql="SELECT * FROM Product WHERE id_Product='$id'";
	$result=mysqli_query($conn,$sql);
	if ($result == false) {
		echo "Loi: ".mysqli_error($conn);
	}
	else if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_assoc($result);
		$name = $row['Name'];
		$price = $row['Price'];
		$file_name = $row['image'];
		$description = $row['Description'];
		$status = $row['Status'];
		$id_Categorize = $row['id_Categorize'];
	}
	//lay ra anh mota sanpham
	$img_pro = mysqli_query($conn,"SELECT * FROM product_images WHERE id_Product='$id'");
}


if(isset($_POST['btn'])){
	$name=$_POST['Name'];
	$price = $_POST['gia'];
	$status = $_POST['status'];
	$description=$_POST['description'];
	$id_Categorize=$_POST['categorize'];
// 1 anh
	if(isset($_FILES['image'])){
		$file=$_FILES['image'];
		$file_name= $file['name'];
		$folder ="../public/images/";
		$url = $folder.$file_name;

		//truong hop nguoi dung khong chon anh
		if (empty($file_name)) {
			$url = $row['image'];
		}
		//truong hop chon lai anh
		else{
			if($file['type']=="image/jpg" || $file['type']=="image/png" ||$file['type']=="image/jpeg"){

			move_uploaded_file($file['tmp_name'],$url);

			}
			else{
				echo "Không đúng định dạng";
				$file_name ="";
			}
		}
		
	}
//ktra nhieu anh
	if(isset($_FILES['images'])){
		$files=$_FILES['images'];
		$file_names= $files['name'];

		if (!empty($file_names[0])) {
			//xoa anh cu 
			mysqli_query($conn,"DELETE FROM product_images WHERE id_Product='$id'");
			//chuyển file 
			foreach ($file_names as $key =>$value) {
				$url2 = "../public/images/".$file_names;
				move_uploaded_file($files['tmp_name'][$key],$url2);
			}
			//insert anh moi vao
			foreach ($file_names as $key => $value) {
				$url2='../public/images/'.$value;
				mysqli_query($conn,"INSERT INTO product_images VALUES('$id','$url2')");
			}
		}	
	}
	$sql="UPDATE Product SET Name='$name',Price='$price',image='$url',Description='$description',Status='$status',id_Categorize='$id_Categorize'WHERE id_Product='$id'";
	$result=mysqli_query($conn,$sql);
	
	if($result==false){
		echo "Loi: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=product&action=list");
	}
} 
?>

<?php  
$title="Sửa sản phẩm";
require_once 'Layout/header.php';
?>

<style type="text/css">
.edit_product{
  /*text-align: left;*/
  margin-top: 20px;  
  padding-left: 30px;
}
.edit_product form label{
	font-size: larger;
}
.edit_product form{
  margin-top: 30px;
}
.edit_product form p{
  display: inline-block;
  float: left;
  padding-left: 50px;    
}
.edit_product form input{
  font-size: 16px;
  width: 270px;
  height: 35px;
  
  padding-left: 10px;
  border-radius: 5px;
  margin-bottom: 15px;

}
.edit_product form .img input{
	outline: none;
  border : 1px solid green;
}
.edit_product form .sl{
	  font-size: 16px;
  width: 200px;
  height: 35px;
  border-radius: 5px;
}
.edit_product button{
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
.edit_product button:hover{
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
	min-height: 500px;
}
.foot{
	clear: both;
}
#sdpic{
	display: grid;
 grid-template-columns: repeat(4,1fr);;
 column-gap: 0.5rem;
 grid-row-gap: 0.5rem;
 margin: 0;
</style>
<div class="edit_product">
	<h1>Sửa sản phẩm </h1>
	<form method="POST" enctype="multipart/form-data">
		<div class="left">
		<label class="img" > Tên sản phẩm<br>
			<input type="text" name="Name" required value="<?php echo $name ?>">
		</label>
		<br>
		<label class="img"> Gía sản phẩm<br>
			<input type="text" name="gia" required value="<?php echo $price ?>">
		</label>
		<br>
		<label >Tình trạng<br>
			<select name="status"  class="sl" >
				<option value="0" <?php  if($status==0) echo "selected"?>>Hết hàng</option>
				<option value="1" <?php  if($status==1) echo "selected"?>>Còn hàng</option>
				<option value="2" <?php  if($status==2) echo "selected"?>>Hàng sắp về</option>
			</select>			
		</label>
		<br>
		<br>
		<label> Phân loại <br>
			<select name="categorize"  class="sl">
				<?php  
					$sql="SELECT id_Categorize,Name FROM Categorize";
					$result=mysqli_query($conn,$sql);
					if($result == false){
						echo "Loi: ".mysqli_error($conn);
					}
					else if(mysqli_num_rows($result)>0){
						foreach ($result as $row) {
							$id=$row['id_Categorize'];
							if ($id == $id_Categorize) {
								$selected ="selected";
							}
							else{
								$selected ="";
							}
							echo "<option value='$id' $selected>";
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
				<img src="<?php echo $file_name ;?>" width=200px height=200px>
			</label>
			<br>
			<label >  Ảnh chính<br>
				
				<input type="file" name="image" >				
			</label>
			<br>
			<label  > 
				
				<div id="sdpic">
				<?php  
					foreach ($img_pro as $key => $value) {
						?>
						<img src="<?php echo $value['URL'] ?>" alt='ảnh phụ' style="height: 100px; width: 100px;">
					
				<?php } ?>
				</div>
				Ảnh mô tả <br>
				<input type="file" name="images[]" multiple="multiple"  >
				<br>
			</label>
		</div>
		<div class="foot">
		<label > Mô tả sản phẩm<br>
			<textarea cols="50" rows="5" name="description" id="description"> <?php echo $description; ?></textarea>
		</label>
		<br>
		</div>
		<button type="submit" name="btn">Sửa</button>
	</form>
</div>
<?php  
require_once 'Layout/footer.php';
?>
