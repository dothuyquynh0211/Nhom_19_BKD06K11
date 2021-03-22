<?php 
$title="Bài viết" ; 
require_once 'Layout/header.php';
?>
<?php  
 if(isset($_POST['btnHT'])){
 	$title=$_POST['title'];
 	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date= date("Y-m-d H:i:s");
	$body=$_POST['body'];
	$stt=$_POST['stt'];
	
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
	$sql="INSERT INTO Post VALUES (null,'$date','$url','$title','$body','$stt')";
	$result=mysqli_query($conn,$sql);
	if($result==false){
		echo "Loi: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=post&action=list");
	}
 }
?>
<style type="text/css">
	.insert_post{
  /*text-align: left;*/
  margin-top: 20px;  
  padding-left: 30px;
}
.insert_post form label{
	font-size: larger;
}
.insert_post form{
  margin-top: 30px;
}
.insert_post form p{
  display: inline-block;
  float: left;
  padding-left: 50px;    
}
.insert_post form input{
  font-size: 16px;
  width: 99%;
  height: 35px;
  
  padding-left: 10px;
  border-radius: 5px;
  margin-bottom: 15px;

}
.insert_post form .title input{
	outline: none;
  border : 1px solid green;
}
.insert_post form .sl{
	font-size: 16px;
  width: 150px;
  height: 35px;
  border-radius: 5px;
}
.insert_post button{
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
.insert_post button:hover{
      background: #0BA61D;
      color: white;
      transition: background 0.6s;
}

</style>
<div class="insert_post">
<h1>Thêm bài viết</h1>
<form method="POST" enctype="multipart/form-data">
	<label class="title"> Tiêu đề <br>
			<input type="text" name="title" required >
	</label>
	<br>
	<label > Ảnh <br>
		<input type="file" name="image" >
	</label>
	<br>
	<label > Nội dung bài viết<br>
		<textarea cols="60" rows="10" name="body"  id="body"></textarea>
	</label>
	<br>
	<label >Tình trạng<br>
		<select name="stt" class="sl">
			<option value="0">Hoàn thành</option>
			<option value="1">Chưa hoàn thành</option>
		</select>			
	</label>
	<br>
	<button type="submit" name="btnHT">Lưu</button>
</form>
</div>
<?php  
require_once 'Layout/footer.php';
?>