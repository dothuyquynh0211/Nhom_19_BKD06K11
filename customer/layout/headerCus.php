<!DOCTYPE html>
<html>
<head>
	<title>
		<?php  echo $title;?>
	</title>
	<style>
		.avt{
			width: 30px;
			height: 30px;
			border-radius: 50%;
		}
	</style>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="layout/style.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="navbar">
				<div class="logo">
					<img src="layout/img/logo04.png" alt="Logo">
				</div>
				<nav>
					<ul>
						<li>
							<a href="index.php?module=home&action=home"><i style='font-size:24px' class='fas'>&#xf015;</i></a>
						</li>
						<li>
							<a href="index.php?module=product&action=product">Product</a>
						</li>
						<li>
							<a href="">About</a>
						</li>
						<li>
							<a href="">Contact</a>
						</li>
						<li>
							<!-- <img src="../public/avt_cus/customer.png" alt="1" width="50px" height="50px"> -->
							<?php 
							if(isset($_SESSION['id_Cus'])){
								echo "<a href='index.php?module=common&action=setting'>";
								if(!isset($_SESSION['avt'])){							
									$id=$_SESSION['id_Cus'];
									$query=(mysqli_query($conn,"SELECT Avatar FROM customer WHERE id_Customer='$id'"));
									$row=mysqli_fetch_assoc($query);
									$anh=$row['Avatar'];
									echo "<img src='$anh' class='avt' >";
								}
								else {
									$anh=$_SESSION['avt'];
									echo "<img src='$anh'  class='avt' >";
								}
								
								echo "<p>".$_SESSION['signup']."</p>";
								echo "</a>";
								// echo "<a href='index.php?module=common&action=logout'>Dang xuat</a>";
							}
							else{
								echo "<a href='index.php?module=common&action=login'>Dang nhap</a>";
								echo "<a href='index.php?module=common&action=signup'>Dang ky</a>";
							 
							}
							?>
							
						</li>
						
						<li>
							<a href="index.php?module=invoice&action=cart">Gio hang
							<?php  
							$sl=0;
							if(isset($_SESSION['cart'])){
								foreach ($_SESSION['cart'] as $id => $quantity) {
									$sl += $quantity;
								}
								echo "[$sl]";
							}
							?> 
							</a>
						</li>
					</ul>
				</nav>
					
			</div>
			
		</div>
		<div class="menu">
			
			<ul>
				<li><a href="index.php?module=product&action=product"><i class="fas fa-seedling"></i>Danh mục</a></li>
				<li><a href="index.php?module=product&action=list_Caydeban"><i class="fas fa-seedling"></i> Cây để bàn</a></li>
				<li><a href="index.php?module=product&action=list_Caymini"><i class="fas fa-seedling"></i>Cây mini</a></li>
				<li><a href="index.php?module=product&action=list_Cayphongthuy"><i class="fas fa-seedling"></i>Cây phong thủy</a></li>
				<li><a href="index.php?module=product&action=list_Caythuysinh"><i class="fas fa-seedling"></i>Cây thủy sinh</a></li>
			</ul>
		</div>
		<div class="content">
		
