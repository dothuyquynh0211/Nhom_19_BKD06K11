<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?> </title>
	<meta charset="utf_8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing:border-box;
			border-collapse: collapse;
			list-style: none;
			text-decoration: none;
		}
		body{
			background-color: #A4E2AA;
		}
		.container{
			width: 1200px;
			min-height: 100vh;
			margin: auto;
			background-color: white;
			
		}
		.header{
			width: 100%;
			height: 17vh;
			background-image:linear-gradient(to right,white, lightgreen);
			display: flex;
			justify-content: space-between;
		}
		.header a{
			color: black;
		}
		.header .right{
			margin-top: 75px;
			margin-right: 10px;
		}
		.header .right ul li{
			position: relative;
			list-style: none;
			display: inline-block;
		}
		.header .right ul li a{
			display: flex;
			align-items: center;
			margin: 0 10px;
		}
		.header .right ul li a h3{
			font-size: 20px;
		}
		.header .right ul li i{
			margin: 10px;
		}
		.header .right ul li{
			position: relative;
		}
		.header .right ul ul{
			position: absolute;
			top: 40px;
			right: 10px;
			background: lightgrey;
			padding: 5px 5px;
			border-radius: 10px;
			width: 140px;
			display: none;
		}
		.header .right ul li ul.fas{
			margin-right: 5px;
		}
		.header .right ul li ul:before{
		  position: absolute;
		  content: '';
		  top: -20px;
		  left: 50%;
		  transform: translateX(-50%);
		  border: 10px solid ;
		  border-color: transparent transparent lightgrey transparent;
		}
		.header .right ul li:hover > ul {
		  display:block;

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
			background: green;
			transition: background 1s;

		
		}
		#menu ul li{
			position: relative;
		}

		.content{
		      padding-left: 10px;
		      width: 80%;     
		      min-height: 80vh;
		      /*border-left: 1px solid green;*/
		      overflow: auto ;

		}
		
	</style>
<script type="text/javascript">
	var a = document.querySelector(".right ul li");
	a.addEventListener("click",foo);
	var b=a;
	b.classList.toggle("active")j
</script>

</head>
<body>
	<div class="container">
		<div class="header" >
			<div class="left">
			<img src="img/logo04.png" alt="Logo">
			</div>
			<div class="right">
				<ul>
					<li>
						<a href="index.php?module=common&action=manage">
						<h3><?php if(isset($_SESSION['admin'])) echo $_SESSION['admin']['name'];?></h3>
						<i class="fas fa-angle-down" onclick="foo"></i>
						</a>
							<ul>
								<li><a href="index.php?module=common&action=manage"><i class="fas fa-sliders-h"></i>Quản lý</a></li>
								<li><a href="index.php?module=common&action=AdminLogin"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
		<div id="menu">
			
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
					<a href="index.php?module=post&action=list">Quản lý bài viết</a>
				</li>
			</ul>
			<ul class="ql">
				<li>
					<a href="index.php?module=categorize&action=list">Phân loại</a>
				</li>
			</ul>
		</div>
		<div class="content">