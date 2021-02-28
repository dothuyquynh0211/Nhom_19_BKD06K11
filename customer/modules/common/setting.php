<?php
$error="";
$id=$_SESSION['id_Cus'];
$sqli="SELECT Avatar FROM customer WHERE id_Customer='$id'";
$resulti=mysqli_query($conn,$sqli);
$row=mysqli_fetch_assoc($resulti);

if (isset($_POST['btn'])) {		
	$file=$_FILES['image'];
	$file_name= $file['name'];
	$folder ="../public/avt_cus/";
	$url = $folder.$file_name;
	if($file['type']=="image/jpg" || $file['type']=="image/png" ||$file['type']=="image/jpeg"){
		move_uploaded_file($file['tmp_name'],$url);
	}
	else{
		echo "Không đúng định dạng";
		$file_name ="";
	}
	$sql="UPDATE customer SET Avatar='$url' WHERE id_Customer='$id'";
	$result=mysqli_query($conn,$sql);
	$_SESSION['avt']=$url;
	if($result == false) {
	  	$error ="LOI CU PHAP : ".mysqli_error($conn);	  		
	  	die("Thoat");
	}
	else{
		$error = "Cập nhật ảnh thành công !";
		//header("Location:index.php?module=common&action=setting");
	}
	mysqli_close($conn);
} 
	
	
	

?>
<?php 
$title="Cài đặt || Chun Garden" ;
require_once ('layout/headerCus.php');
?>
<script>
		function changePhoto(){
			let vPhoto = document.getElementById('img_preview');
			let vLink = document.getElementById('url_img');
			let vURL = URL.createObjectURL(vLink.files[0]);
			vPhoto.src = vURL;
		}
	</script>
<h1>thông tin tài khoản </h1>
<div>
	<h1>Thay đổi thông tin</h1>
	<h2>Thay đổi anh đại diện</h2>
	<form method="POST" enctype="multipart/form-data">

		<img src="<?php echo $row['Avatar'] ?>" id="img_preview" width="100px" height="100px">
		<label >   
			<br>
			<input type="file" name="image" id="url_img" onchange="changePhoto()" >
		</label>
		<button type="submit" name="btn">Cập nhật</button>

	</form>
	
</div>
<p><?php if(!empty($error)) echo $error;  ?></p>
<a href="index.php?module=common&action=change">Đổi mật khẩu</a>
<a href="index.php?module=invoice&action=history">lịch sử mua hàng</a>
<a href="index.php?module=common&action=logout">Đăng xuất</a>

<?php  
require_once ('layout/footerCus.php');
?>