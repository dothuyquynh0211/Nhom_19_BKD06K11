<?php  
if(isset($_GET['id'])){
	$id= $_GET['id'];
	$sql="SELECT * FROM Post WHERE id_Post='$id'";
	$result=mysqli_query($conn,$sql);
	if ($result == false) {
		echo "Loi: ".mysqli_error($conn);
	}
	else if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_assoc($result);
		$tit = $row['title'];
		$body = $row['body'];
		$stt=$row['status_post'];
		$file_name=$row['pic'];
	}
}
if(isset($_POST['btnHT'])){
	$tit=$_POST['title'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date= date("Y-m-d H:i:s");
	$body=$_POST['body'];
	$stt=$_POST['stt'];
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
	$sql="UPDATE Post SET date_post='$date',pic='$url', title='$tit',body='$body',status_post='$stt' WHERE id_Post='$id'";
	$result=mysqli_query($conn,$sql);
	
	if($result==false){
		echo "Loi: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=post&action=list");
	}
} 
?>

<?php 
$title="Sản Phẩm" ; 
require_once 'Layout/header.php';
?>
<style type="text/css">
	
	.edit_post{
  /*text-align: left;*/
  margin-top: 20px;  
  padding-left: 30px;
}
.edit_post form label{
	font-size: larger;
}
.edit_post form{
  margin-top: 30px;
}
.edit_post form p{
  display: inline-block;
  float: left;
  padding-left: 50px;    
}
.edit_post form input{
  font-size: 16px;
  width: 99%;
  height: 35px;
  
  padding-left: 10px;
  border-radius: 5px;
  margin-bottom: 15px;

}
.edit_post form .title input{
	outline: none;
  border : 1px solid green;
}
.edit_post form .sl{
	font-size: 16px;
  width: 150px;
  height: 35px;
  border-radius: 5px;
}
.edit_post button{
  text-align: center;
      width: 100px;
      height: 40px;     
      border-radius: 5px; 
      font-size: 20px;
      border: none;
      outline: none;
      margin-top: 20px;
      margin-bottom: 20px;
    }
.edit_post button:hover{
      background: #0BA61D;
      color: white;
      transition: background 0.6s;
}

</style>
<div class="edit_post">
<h1>Sửa bài viết</h1>
<form method="POST" enctype="multipart/form-data">
	<label class="title" > Tiêu đề <br>
			<input type="text" name="title" required value="<?php echo $tit ?>" >
	</label>
	<br>
	<label>
		<img src="<?php echo $file_name ;?>" width=200px height=200px>
	</label>
	<br>
	<label >
		<input type="file" name="image" >
	</label>
	<br>
	<label > Nội dung bài viết<br>
		<textarea cols="60" rows="20" name="body"  id="body" > <?php echo $body ?></textarea>
	</label>
	<br>
	<label >Tình trạng<br>
		<select name="stt" class="sl">
			<option value="0" <?php  if($stt==0) echo "selected"?> > Hoàn thành</option>
			<option value="1" <?php  if($stt==1) echo "selected"?> > Chưa hoàn thành</option>
		</select>			
	</label>
	<br>
	<button type="submit" name="btnHT">Lưu</button>
</form>
</div>
<?php  
require_once 'Layout/footer.php';
?>