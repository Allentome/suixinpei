<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/slide.css">

    <link rel="stylesheet" href="css/waterFall.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/head.js"></script>
	<script type="text/javascript" src="js/slide.js"></script>
	<script type="text/javascript" src="js/lanjiazai.js"></script>

    <link rel="icon" href="img/ico6.ico" type="image/x-icon"/>   <!--设置网页小图标-->
    <title>随心配首页</title>
</head>

<body>

	<!--logo-->
	<div class="header" >
		<div class="container1 clearfix">
			<img class="logo-img" src="img/logo16.png">
            <?php
            session_start();
            if(isset($_SESSION['username'])){
//                echo '欢迎  '.$_SESSION['user'];
                echo '<span   class="h-registers"><a href="logout.php" class="h-register">退出</a></span>';
                echo '<span   class="h-registers"><a href="#" class="h-register">'.$_SESSION['username'].'</a></span>';
            }else{
                echo '<span   class="h-registers"><a href="login.html" class="h-register">登录</a></span>
            <span class="h-registers">
                <a href="register.php" class="h-register">注册</a></span>';
            }?>
			<div class="search bar7">
				<form class="clearfix"method="post"action="search.php">
					<input type="text" placeholder="请搜索衣服" name="crid"id="crid">
					<button type="submit"></button>
				</form>
			</div>

		</div>
	</div>
	<!--导航-->
	<div class="h-nav-bg">

		<div class="container1">
		<nav class="h-nav ">

			<ul class="clearfix">
				<li class="h-nav-a-bg">
					<a href="suixinpei.php" class="h-nav-a ">首页</a>
				</li>
				<li class="h-nav-a-bg">
					<a href="suixinpei.php" class="h-nav-a ">推荐</a>
				</li>
				<li class="h-nav-a-bg">
					<a href="#" class="h-nav-a ">男装</a>
					<div class="h-dropdown">
						<div> <a class="h-dropdown-a" href="#clothes">上衣</a></div>
						<div> <a class="h-dropdown-a" href="#">裤子</a></div>
						<div> <a class="h-dropdown-a" href="#">夏装</a></div>
					</div>
				</li>
				<li class="h-nav-a-bg"><a href="#" class="h-nav-a" >女装</a>
					<div class="h-dropdown">
						<div> <a class="h-dropdown-a" href="#">上衣</a></div>
						<div> <a class="h-dropdown-a" href="#">裤子</a></div>
						<div> <a class="h-dropdown-a" href="#">夏装</a></div>
					</div>
				</li>
                <li class="h-nav-a-bg">
                    <a href="gouwuche.php" class="h-nav-a ">购物车</a>
                </li>
                <li class="h-nav-a-bg">
                    <a href="diyindex.php" class="h-nav-a ">Diy搭配</a>
                </li>
			</ul>
		</nav>
	</div>
	</div>
<?php //include 'nav.php' ?>
<!--轮播-->

    <?php include 'slide.php'?>



<!--    瀑布流-->


<?php include 'lanjiazai.php' ?>

    <?php include 'foot.php' ?>




