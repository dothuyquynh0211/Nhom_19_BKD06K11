<?php 
$title="Bài viết" ; 
require_once 'Layout/header.php';
?>
<?php    
$sql="SELECT * FROM Post ORDER BY id_Post DESC";
if(isset($_GET['kw'])){
	$kw=$_GET['kw'];
	$sql="SELECT * FROM Post WHERE title LIKE '%$kw%'";
}
$result = mysqli_query($conn,$sql);
if($result == false){
	echo "Loi: ".mysqli_error($conn);
	mysqli_close($conn);
	die();		
}
?>
<style type="text/css">
	.list_post{
		padding: 15px;
	}
	.list_post table{
		width: 100%;
		margin-top: 20px;
		text-align: center;
		border-spacing: 35px;

	}
	.list_post a{
		color: green;
		text-decoration: none; 
		border: 2px solid green; 
		padding: 5px;
		float: right;
	}
	.list_post th{
		font-size: larger;

	}
	.list_post table th{
		margin-top:  10px ;
		border-bottom: 2px solid green; 
	}
	.list_post table,tr,th,td{
		border-collapse: collapse;
		
	}
	.list_post table tr td a{
		color: blue;
		border :none;
	}
	.list_post table tr td p{
		text-align: left;
		padding-left: 10px;
	}
	.fa-trash-alt{
		color: red;
	}
	.content_search input{
      width: 250px;
      height: 30px;
      border:1px solid green;
      border-radius: 10px;
      outline: none;
      padding-left: 10px;

    }
    .content_search button{
      margin-left: 5px;
      color: green;
      border: none;
      font-size: larger;
      background: white;
    }
.search{
  margin-top: 30px;
  text-align: center;
}
span h2 {
	color: red;
}
</style>
	<div class="search">
		<form class="content_search" >
			<input type="hidden" name="module" value="post">
			<input type="hidden" name="action" value="list">
			<input type="text" name="kw" placeholder="Bạn cần tìm kiếm...">
			<button type="submit" name="btnSearch"><i class="fas fa-search"></i></button>
			</form>
	</div>
	<div class="list_post">
		<h1>Danh sách bài viết</h1>
		<a href="index.php?module=post&action=insert">Thêm bài viết</a>
		<br>
<br>
<table>
	<tr>
		<th>Mã</th>
		<th>Bài viết</th>
		<th>Thời gian</th>
		<th>Trạng thái</th>
		<th colspan="3"></th>
	</tr>
	<tr>
		<?php 
			$total=mysqli_num_rows($result);
			if(isset($kw)) echo "<h2> Có tất cả $total kết quả tìm kiếm cho : $kw </h2>";
			if(mysqli_num_rows($result)==0){
				echo"<tr>
				<td colspan='7'><h3>Không có bài viết nào</h3></td></tr>";
			}
			else{
				foreach ($result as $row) {
					echo "<tr>";
						$id =$row['id_Post'];
						$title=$row['title'];
						$body=$row['body'];
						$date=$row['date_post'];
					echo "<td>".$id."</td>";
					echo "<td><p>".$title."</p></td>";
					echo "<td>".$date."</td>";
					echo "<td>";
						$arrStatus = array(0 => 'Đã hoàn thành',1=>'Chưa hoàn thành');
						$stt=$row['status_post'];
						echo $arrStatus[$stt];
					echo "</td>";
					echo "<td>";
						echo "<a href='index.php?module=post&action=edit&id=$id'><i class='far fa-edit'></i> </a>";
					echo "</td>";	
					echo "<td>";
						echo "<a href='index.php?module=post&action=delete&id=$id'> <i class='far fa-trash-alt'></i> </a>";
					echo "</td>";
					echo "<td>";
						echo "<a href='index.php?module=post&action=view_post&id=$id'> <i class='far fa-eye'></i> </a>";
					echo "</td>";
					echo "</tr>";
				}
			}
		?>
	</tr>
	
</table>
	</div>
<?php  
require_once 'Layout/footer.php';
?>