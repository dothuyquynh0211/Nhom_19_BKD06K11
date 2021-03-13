<?php
$error="";
$id=$_SESSION['id_Cus'];
$sqli="SELECT Username, Phone, Email,Address, Avatar FROM customer WHERE id_Customer='$id'";
$resulti=mysqli_query($conn,$sqli);
$row=mysqli_fetch_assoc($resulti);
$name=$row['Username'];
$phone=$row['Phone'];
$email=$row['Email'];
$address=$row['Address'];

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
<style>
	#img_preview{
		width: 200px;
		height: 200px;
		border: 2px solid grey;
		/*border-radius: 50%;*/
	}
	#form{
		left: 0px;
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
<div class="inf_cus">
<h2>Thông tin tài khoản </h2>
<div class="change_avt">
	<form method="POST" enctype="multipart/form-data" id="form">

		<img src="<?php echo $row['Avatar'] ?>" id="img_preview">
		<label >   
			<br>
			<input type="file" name="image" id="url_img" onchange="changePhoto()" >
		</label>
		<br>
		<button type="submit" name="btn">Cập nhật</button>

	</form>
	<p><?php echo $name ; ?></p>
	<p><?php echo $phone ;?> </p>
	<p><?php echo $email ;?></p>
	<p><?php echo $address ; ?></p>
</div>
<div class="feature">
	<p><?php if(!empty($error)) echo $error;  ?></p>
	<a href="index.php?module=common&action=change">Đổi mật khẩu</a>
	<br>
	<br>
	<a href="index.php?module=invoice&action=history">Lịch sử mua hàng</a>
	<br>
	<br>
	<a href="index.php?module=common&action=logout">Đăng xuất</a>

</div>
</div>
<?php  
require_once ('layout/footerCus.php');
?>