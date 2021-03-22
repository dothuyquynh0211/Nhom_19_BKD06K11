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
require_once 'layout/headerCus.php';
?>
<style type="text/css">
	.post_detail {
  width: 75%;
  margin-top: 20px;
  margin-bottom: 20px;
  float: left;
 box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
 padding:0 20px;
}
  .text{
  	color: #19AF5A;
  }
  .time{
  	margin:10px 10px;
  	text-align: left;
  }
  .cont{
  	text-align: left;
  	justify-content: space-between;
  	font-size: 18px;
  }
  .danhsach{
  	 margin-top: 20px;
		float: right;
		width: 200px;
		position: relative;
		text-align: left;
	}
	.danhsach h2{
		color: green;
	}
	.danhsach h2:before{
		position: absolute;
		top: 30px;
		content: '';
		height: 2px;
		width: 100%;
		background: grey;
	}
	.bar_post{
		
		margin-top: 20px;
	}
	.bar_post ul{
		border-bottom: 1px solid grey;
		padding: 10px 0;
	}
	.bar_post ul li {
		list-style-type: none;
	}
	.bar_post ul li a{
		font-size: 20px;
		text-decoration: none;
		color: black;
		margin: 10px 0;
	}
	.bar_post ul li a:hover{
		color: green;
	}
</style>
<div class="post_detail">
	<div class="text">
		<h1><?php echo $tit ?></h1>
	</div>
	<div class="time"><p><?php  echo $date ?>  Chun Garden</p></div> 
	<div class="cont">
		<?php echo $body ?>
	</div>
</div>
<div class="danhsach">
		<h2>Bài viết mới nhất</h2>
		<div class="bar_post">
			<?php 
			$sql="SELECT id_Post,date_post,pic,title,body FROM Post WHERE status_post=0 ORDER BY id_Post DESC LIMIT 7";
			$result=mysqli_query($conn,$sql);
			if($result==false){
				echo "Loi: ".mysqli_error($conn);
				mysqli_close($conn);
			die();
			}
			$total=mysqli_num_rows($result);
			$i=0;
			while($i != $total){ 
				while ($row=mysqli_fetch_assoc($result)) { 
					$i++;
					$id=$row['id_Post'];
					echo "<ul>";
						echo "<li>";
							echo "<a href='index.php?module=post&action=view_post&id=$id'> ";
								echo $row['title'];
							echo "</a>";
						echo "</li>";
					echo "</ul>";
				}
			}			
			?>
		</div>
	</div>
<?php  
require_once 'layout/footerCus.php';
?>