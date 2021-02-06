<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?> </title>
	<meta charset="utf_8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing:border-box;
			border-collapse: collapse;
		}
		body{
			background-color: #A4E2AA;
		}
		.container{
			width: 1200px;
			height: 100vh;
			margin: auto;
			background-color: white;
			
		}
		.header{
			width: 100%;
			height: 17vh;
			background-image:linear-gradient(to right,white, lightgreen);
		}
		#menu{
			width: 20%;	
			height: 30vh;
			float : left;
		}
		#menu ul{
			padding: 0px;				
			font-size: 20px;
			background: #8AD385;
			list-style-type: none;
			text-align: center;
			font-style: italic;
		}
		#menu li{
 			border-bottom: 1px solid #e8e8e8;
			width: auto;
			line-height: 3;
		}
		#menu li a{
			display: block;
			color:white;
			
			text-decoration: none;
			
		}
		#menu li:hover{
			background: #00FF2A;
			transition: background 1s;

		}
		#menu li ul{
			display: none;
		}
		#menu ul li{
			position: relative;
		}
		 #cd{
			width: 200px;
			background:lightgray;
			position: absolute;
			left: 200px;
			top: 10px;			
		}
		#cd a{
			height: 40px;
			line-height: 14px;
			padding: 10px;
		}
		#cd a:hover{
			background: blue;

		}

		#menu li:hover ul{
			display: block;
		}
		
		.content{
			float: left;
			width: 80%;
			height: 82vh;
			overflow: auto;
			border-left: 2px solid green;
		}
		img{
			width: 300px;
			height: 110px;
			padding-left: 30px;
		}
		
	</style>


</head>
<body>
	<div class="container">
		<div class="header" >
			<img src="img/logo04.png" alt="Logo">
		</div>
		<div id="menu">
			<ul>
				<li><h3><?php if(isset($_SESSION['admin'])) echo $_SESSION['admin']['name'];?></h3>
					<ul id="cd">
						<li>
							<a href="">Quản lý</a>
							<a href="index.php?module=common&action=AdminLogin">Đăng xuất</a>
						</li>
					</ul>
				</li>
				
			</ul>
			
			<ul class="ql">
				<li>
					<a href="index.php?module=product&action=list">Quản lý sản phẩm</a>
				</li>
			</ul>
			<ul class="ql">
				<li>
					<a href="index.php?module=invoice&action=listinvoice">Quản lý đơn hàng</a>
				</li>
			</ul>
			<ul class="ql">
				<li>
					<a href="index.php?module=categorize&action=list">Phân loại</a>
				</li>
			</ul>
		</div>
		<div class="content">