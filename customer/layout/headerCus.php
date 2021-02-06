<!DOCTYPE html>
<html>
<head>
	<title>
		<?php  echo $title;?>
	</title>
	<meta charset="utf-8">
	<style type="text/css">
		*{
			padding: 0;
			margin: auto;
			box-sizing:border-box;
			border-collapse: collapse;
		}
		*{
			margin: 0;
			padding:0;
			box-sizing: border-box;
		}
		
		.container{
			width: 1200px;
			overflow: auto;
			margin: auto;
			background-color: white;

		}
		.header{
			width: 100%;
			height: 17vh;
			background-image:linear-gradient(to right,pink, lightgreen);
		}
		.content form{
			padding :10px ;
			text-align: center;
		}
		.content_search input{
			width: 250px;
			height: 30px;
			border:1px solid green;
			border-radius: 10px;
			outline: none;
			padding-left: 10px;

		}
		.navbar{
			display: flex;
			align-items: center;
			
		}
		nav{
			flex: 1;
			text-align: right;
		}
		nav ul{
			display: inline-block;
			list-style-type: none;
			text-decoration: none;
		}
		nav ul li {
			display: inline-block;
			margin-right: 20px;
		}
		.navbar a {
			text-decoration:none;
		}
		.menu{
			width: 20%;	
			float:left;
		
			position: relative;

		}
		.menu ul {
			position: relative;
		}
		.menu ul li{
			position: relative;
			left:0;
			color:#999;
			list-style: none;
			margin: 4px 0;
			border-left: 2px solid green;
			transition: 0.5s;
			cursor: pointer;
		}
		.menu ul li::before{
			content: '';
			position: absolute;
			width: 90%;
			height: 100%;
			background: lightgreen;
			transform: scaleX(0);
			transition: 0.5s;
			transform-origin: left;
		}
		.menu ul li:hover::before{
			transform: scaleX(1);
		}
		.menu ul li:hover{
			left: 15px;
		}
		.menu ul li a{
			position: relative;
			padding:8px;
			display: inline-block;
			z-index: 1;
			transition: 0.5s;
			text-decoration: none;
			color: green;
		}
		.menu ul li:hover a{
			color:black;
		}
		.content{
			float:left;
			padding-left: 20px;
			width: 80%;
			height: 100vh;
			border: 1px solid green;
			
		}
		.footer{
			width: 100%;
			height: 100px;
			background: pink;
			clear: both;
		}
	</style>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
							<a href="index.php?module=common&action=signup">Dang nhap</a>
						</li>
					</ul>
				</nav>
					
			</div>
			
		</div>
		<div class="menu">
			
			<ul>
				<li><a href=""><i class="fas fa-seedling"></i>Danh mục</a></li>
				<li><a href="index.php?module=product&action=list_Caydeban"><i class="fas fa-seedling"></i> Cây để bàn</a></li>
				<li><a href=""><i class="fas fa-seedling"></i>Cây mini</a></li>
				<li><a href=""><i class="fas fa-seedling"></i>Cây phong thủy</a></li>
				<li><a href=""><i class="fas fa-seedling"></i>Cây thủy sinh</a></li>
			</ul>
		</div>
		<div class="content">
		
