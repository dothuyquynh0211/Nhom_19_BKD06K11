<?php  
$title="Invoice";
require_once 'Layout/header.php';
?>
<style type="text/css">
	#list{
		padding: 15px;

	}
	#list table{
		width: 50%;
	}
	#list table, tr,th,td{
		border: 1px solid green;
		height: 30px;
		border-collapse: collapse;
		text-align: center;
	}

</style>
<div id="list">
	<h1>Danh sách phân loại:</h1>
	<br>
	<a href="index.php?module=categorize&action=insert">Thêm phân loại </a>
	<table>
		<tr>
			<th>ID</th>
			<th>Tên</th>
			<th colspan="2">Action</th>
		</tr>
		<?php  
			$sql="SELECT * FROM Categorize";
			$result= mysqli_query($conn,$sql);
			if($result == false){
				echo "Loi: ".mysqli_error($conn);
			}
			else if(mysqli_num_rows($result)==0){
				echo "<tr> <th colspan='4'> Danh sách rỗng </th></tr>";
			}
			else{
				foreach ($result as $row) {
					echo "<tr>";
						$id=$row['id_Categorize'];
						echo "<td>".$id."</td>";
						echo "<td>".$row['Name']."</td>";
						echo "<td>";
							echo "<a href='index.php?module=categorize&action=edit&id=$id'> Edit </a>";
						echo "</td>";	
						echo "<td>";
							echo "<a href='index.php?module=categorize&action=delete&id=$id'> Delete </a>";
						echo "</td>";
					echo "</tr>";
				}	
			}

		?>
	</table>
</div>

<?php  
require_once 'Layout/footer.php';
?>