<?php  
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
			move_uploaded_file($files['tmp_name'][$key],'../public/images/'.$value);
			}
		}
		
	}
	$sql="INSERT INTO Product VALUES (null,'$name','$price','$url','$description','$status','$id_Categorize')";
	$result=mysqli_query($conn,$sql);
	//lay ra id product	
	$id_Product=mysqli_insert_id($conn);
	foreach ($file_names as $key => $value) {
		mysqli_query($conn,"INSERT INTO product_images VALUES('$id_Product','$value')");
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
	.pl form{
		font-size: 16px;
		padding: 20px 20px;
	}
	input{

	}
</style>
<div class="pl">
	<h1>Thêm sản phẩm </h1>
	<form method="POST" enctype="multipart/form-data">
		<label > Name <br>
			<input type="text" name="Name" required placeholder="Tên sản phẩm">
		</label>
		<br>
		<label > Gía <br>
			<input type="text" name="gia" required placeholder=" Gía sản phẩm">
		</label>
		<br>
		<label >Tình trạng<br>
			<select name="status" >
				<option value="0">Hết hàng</option>
				<option value="1">Còn hàng</option>
				<option value="2">Hàng sắp về</option>
			</select>			
		</label>
		<br>
		<label> Phân loại <br>
			<select name="categorize">
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
		<br>
		<br>
		<label >  Ảnh <br>
			<input type="file" name="image" >
		</label>
		<br>
		<label > Ảnh mô tả <br>
			<input type="file" name="images[]" multiple="multiple"  >
		</label>
		<br>
		<label > Mô tả <br>
			<textarea cols="60" rows="10" name="description" id="description"></textarea>
		</label>
		<br>
		<button type="submit" name="btn">Thêm</button>
	</form>
</div>
<?php  
require_once 'Layout/footer.php';
?>