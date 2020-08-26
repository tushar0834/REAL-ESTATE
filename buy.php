<!DOCTYPE html>
<html lang="en">
<head>
	<title>REAL ESTATE</title>
	<meta charset="UTF-8">
	<meta name="description" content="HOUSING-CO">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="Styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<style type="text/css">
	.jumbotron
	{
		background-color: hotpink;

	}
	.marquee
	{
width: 450px;
    line-height: 50px;
    
    white-space: nowrap;
    overflow: hidden;
    box-sizing: border-box;

	}
body
{
	background-image: url(18.jpg);
	background-repeat: no-repeat;
	background-size: cover;
}

</style>
</head>
<body >

	
	<!-- Header section -->
	<header class="header-section">
		<marquee direction="left" scrolldelay="30" truespeed="30" behavior="alternate">
		<div class="header-top" style="background-color: salmon;">
			<div class="container" >
				<div class="row" >
					<div class="col-lg-6 header-top-left"  >
						<div class="top-info ">
							<h3>DashBoard</h3>
						</div>
					</div>
					
						<div class="user-panel">
							<a href="logout.php"><?php session_start(); echo $_SESSION['username']."  ";?><i class="fa fa-user-circle-o"></i>Logout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</marquee>
		<marquee direction="down" scrolldelay="40" truespeed="40">
		<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img src="img/LOGO.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</marquee>
	</header>
	<!-- Header section end -->


	<!-- Hero section -->
	

	<!-- Hero section end -->
	<?php 
	include('indexDB.php');
	$loc=$c='';
	$m="select uid from flat";
	$n = $conn->query($m);
	$xv=mysqli_fetch_array($n, MYSQLI_ASSOC);
	$x1="select distinct location from flat";
	$x2="select distinct city from flat";
	$q="select * from cardsale order by time desc";
	if(isset($_POST['loc']) && isset($_POST['city']))
	{
		$loc=$_POST['loc'];
		$c=$_POST['city'];
		if($loc=='All' && $c=='All')
		{
			$q="select * from cardsale order by time desc";
		}
		if($loc=='All' && $c!='All')
		{
			$q="select * from cardsale where city='$c' order by time desc";
		}
		if($loc!='All')
		{
			$x2="select city from cardsale where location='$loc'";
			$q="select * from cardsale where location='$loc' order by time desc";
		}
	}
	$r1=$conn->query($x1);
	$r2=$conn->query($x2);
	?>

	<!-- Filter form section -->
	<div class="filter-search" style="background-color: gray;">
		<div class="container">
			<form class="filter-form" method="post" action="BUY.php">
			<h2>Search by Location</h2>
			<h4>Location   City</h4>
			
			
				<select name="loc">
										<option value="All" selected>All</option>
					<?php 
					while($p1=mysqli_fetch_array($r1, MYSQLI_ASSOC))
					{
						echo "<option value='".$p1['location']."'>".$p1['location']."</option>";
					}
					?>
				</select>
				<select name="city">
					<option value="All" selected>All</option>
					<?php 
					while($p2=mysqli_fetch_array($r2, MYSQLI_ASSOC))
					{
						echo "<option value='".$p2['city']."'>".$p2['city']."</option>";
					}
					?>
				</select>
				<button class="site-btn fs-submit" type="submit">SEARCH</button>
			</form>
		</div>
	</div>
	<!-- page -->
	<section class="page-section categories-page">
		<br><br>
		<h2 align="center">All Properties</h2>
						<br><br>
		<div class="container">
			<div class="row">

				<?php
						$r = $conn->query($q);
						while($x=mysqli_fetch_array($r, MYSQLI_ASSOC))
						{
							?>
							<div class='col-md-4' style="height:300px;">
								<form action='single-list_sale.php?action=add&id=<?php echo $x['flat_id']; ?>' method="post">
								<div class='sale-notic'>FOR Sale</div>
									<div class='propertie-info text-white' style="background-image:url('<?php echo $x['image'] ?>');background-repeat: no-repeat;height:270px">
									<div class='info-warp'>
										<p><i class='fa fa-map-marker'></i><?php echo $x['location'] ?></p>
									</div>
									<button class='price' type='submit'><?php echo "Rs. ".$x['totalcost'] ?></button>
									</div>
									</form>
							</div>
				<?php
						}
				?>
			</div>
		</div>
		<br><br>
		
	</section>

	
	<!-- Footer section end -->                               
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>