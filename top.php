<?php
if(!session_id())
{
	session_start();
}
include("conn/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/body.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/head.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
$(function() {
	var pull= $('#pull');
		menu = $('nav ul');
		menuHeight	= menu.height();
	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});
</script>
</head>
<body>
<div class="top-bar">
		<div class="container">
			
			<div class="logo"><a href="#"><img src="images/logo.png" title="logo" /></a></div>
		</div>
	</div>
<div id="home" class="header">
	<div class="container">
		
		<nav class="topnav">
			<ul class="topnav1">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="shops.php">Products</a></li>
                <li><a href="gouwu1.php">Shopping Cart</a></li>
		<li><a href="news.php">Hanfu News</a></li>
		<li><a href="pinglun.php">Message Center</a></li>
		<li><a href="intro.php">Hanfu Introduction</a></li>
              
				<?php
                	if(isset($_SESSION["username"])){
						?><li><a href="usercenter.php">User Center</a></li><li><a href="logout.php">Log Out</a><?php } else{
						?><li><a href="reg.php">Register</a></li><li><a href="login.php">Login</a></li>
				<?php }?>
				<li style="text-align:center;"><div class="search">
						<form name="form2" action="search.php" method="get">
							<input type="search" placeholder="Search" required  name="keywords"/>
							<input type="submit" value=" ">
						</form>
				</div>
				<li><a href="admin/index.php">Backend Management</a></li>


			</ul>
			<a href="" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>
		<div class="clearfix"> </div>
	</div>
</div>