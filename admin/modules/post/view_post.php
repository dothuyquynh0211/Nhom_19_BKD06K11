<?php 
if(isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql="SELECT date_post,title,body FROM Post WHERE id_Post='$id'";
	$result=mysqli_query($conn,$sql);
 	if($result==false){
		echo "Loi: ".mysqli_error($conn);
	}
	else if (mysqli_num_rows($result)==0){
		echo "<h2> Không tìm thấy chi tiết sản phẩm </h2>";
	}
	else{
		$row = mysqli_fetch_assoc($result);
		$tit=$row['title'];
		$body = $row['body'];
		$date=$row['date_post'];   
	}
}
?>
<?php 
$title="Sản Phẩm" ; 
require_once 'Layout/header.php';
?>
<style type="text/css">
	.post_detail {
 		width: 100%;
  		margin-top: 20px;
  		padding: 0 20px;
	}
	.tt{
  		text-align: center;
  		color: green;
	}
  	.date{
  		margin-top: 20px;
  		text-align: left;
  		color: pink;
  	}
  	.text{
  		margin-top: 20px;
  		text-align: left;
  		font-size: 18px;
  	}
</style>
<div class="post_detail">
	<div class="tt">
	<h1><?php echo $tit ?></h1>
	</div>
	<div class="date">
	<p style="color: black;">Cập nhật lần cuối : </p><?php  echo $date ?>
	</div>
	<div class="text">
		<?php echo $body ?>
	</div>
</div>
<?php  
require_once 'Layout/footer.php';
?>