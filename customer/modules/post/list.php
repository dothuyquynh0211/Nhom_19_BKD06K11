<?php 
$title=" Bài viết || Chun Garden";
require_once ('layout/headerCus.php');
?>
<?php 
$sql="SELECT id_Post,date_post,pic,title,body FROM Post WHERE status_post=0";
$kw="";
if(isset($_GET['kw'])){
	$kw=$_GET['kw'];
	$sql.=" AND title LIKE '%$kw%'";
	
}
$result=mysqli_query($conn,$sql);

if($result==false){
	echo "Loi: ".mysqli_error($conn);
	mysqli_close($conn);
	die();
}
?>
<div class="search">
	<form class="content_search">
		<input type="hidden" name="module" value="post">
		<input type="hidden" name="action" value="list">
		<input type="text" name="kw" placeholder="Bạn cần tìm kiếm...">
		<button type="submit" ><i class="fas fa-search"></i></button>
	</form>
</div>
	<div class="text">
			<?php 
				$total=mysqli_num_rows($result);
				if(!empty($kw)) echo "<h2> Có tất cả $total kết quả tìm kiếm bài viết về : $kw </h2>";
				$count=0;
				while($count != $total){ ?>
						<?php  while ($row=mysqli_fetch_assoc($result)) { 
							$count++;
							$id=$row['id_Post'];
							?>
							<div class="post">
							<div class="picture">								
								<img src="<?php echo $row['pic'] ?>" alt="anh">
							</div>
							<div class="title">
								<a href="index.php?module=post&action=view_post&id=<?php echo $id ?>">
									<?php echo $row['title'] ?>
								</a>
							</div>
							</div>
						<?php 
						}  ?>
									
				<?php } ?>
			
	</div>
	<div class="danhsach">
		<h2>Bài viết mới nhất</h2>
		<div class="bar_post">
			<?php 
			$sql.=" ORDER BY id_Post DESC LIMIT 7";
			$result=mysqli_query($conn,$sql);
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
		

<style type="text/css">
	.text{
		margin-top: 20px;
		margin-left: 20px;
		float: left; 
		width: 70%;
	}
	.text .post{
		box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
		width: 100%;
	}
	.post{
		margin-bottom:20px;
		height: 100px;
	}
	.text .title a{
		text-decoration: none;
		padding-left: 20px;
		font-size: 22px;
		color: black;
		float: left;
	}
	.text .title a:hover{
		color: green;
	}
	.picture img{
		height: 100px;
		width: 150px;
	}
	.picture{
		float: left;
	}
	.title{
		height: 100px;
		width: 460px;
		float: left;
		padding: 10px 0;
	}
	.danhsach{
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
<?php  
require_once ('layout/footerCus.php');
?>