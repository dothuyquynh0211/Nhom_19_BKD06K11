<!DOCTYPE html>
<html>
<head>
	<title>
		<?php  echo $title;?>
	</title>
	
	<meta charset="utf-8">
	<link rel="icon" type="image/png" sizes="32x32" href="layout/img/favicon.png">
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
							<a href="index.php?module=home&action=home">Trang chủ</a>
						</li>
						<!-- <li>
							<a href="index.php?module=product&action=product">Product</a><i style='font-size:24px' class='fas'>&#xf015;</i>
						</li> -->
						<li>
							<a href="index.php?module=home&action=aboutUs"> Giới thiệu</a>
						</li>
						<li>
							<a href="index.php?module=home&action=contact"> Liên hệ</a>
						</li>
						<li>
							<a href="index.php?module=invoice&action=cart"><i class="fas fa-cart-plus" style="font-size: 20px;"></i>
							<?php  
							$sl=0;
							if(isset($_SESSION['cart'])){
								foreach ($_SESSION['cart'] as $id => $quantity) {
									$sl += $quantity;
								}
								echo "($sl)";
							}
							?> 
							</a>
						</li>
						<li id="cus">
							<!-- <img index.php?module=common&action=settingsrc="../public/avt_cus/customer.png" alt="1" width="50px" height="50px"> -->
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
								
								echo "<p>".$_SESSION['signup']."<i class='fas fa-angle-down'> </i>";
								// echo "<div class='dropdown'>
								echo"<ul class='dropdown'>
											<li><a href=''><i class='fas fa-user'></i>Tài khoản</a></li>
											<li><a href=''><i class='fas fa-sliders-h'></i> Cài đặt</a></li>
											<li><a href=''><i class='fas fa-sign-out-alt'></i>Đăng xuất</a></li>
										</ul>";
									
								echo "</p>";

								// echo "<a href='index.php?module=common&action=logout'>Dang xuat</a>";
								
								echo "</a>";

							}
							else{
							
							
							echo  "<div class='dn' >";
							
								echo "<a href='index.php?module=common&action=login'>Đăng nhập</a>";
								echo "<a href='index.php?module=common&action=signup'>Đăng kí</a>";
							echo "</div";
							}
							?>
							
						</li>
						
						
					</ul>
				</nav>
					
			</div>
			
		</div>

		<div class="menu">
			
			<ul>
				<h2><a href="index.php?module=product&action=product"><i class="fas fa-seedling"></i>Danh mục</a></h2>
				<li><a href="index.php?module=product&action=list_Caydeban"><i class="fas fa-seedling"></i> Cây để bàn</a></li>
				<li><a href="index.php?module=product&action=list_Caymini"><i class="fas fa-seedling"></i>Cây mini</a></li>
				<li><a href="index.php?module=product&action=list_Caychautreo"><i class="fas fa-seedling"></i>Cây chậu treo</a></li>
				<li><a href="index.php?module=product&action=list_Caythuysinh"><i class="fas fa-seedling"></i>Cây thủy sinh</a>
				</li>
				<li><a href="index.php?module=product&action=ky_thuat"><i class="fas fa-seedling"></i> Kỹ thuật chung</a></li>
			</ul>
		</div>
		<div class="content">
		
