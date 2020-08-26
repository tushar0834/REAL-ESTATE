<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Real-Estate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.jumbotron
  	{
  		color: red;
  		text-align: center;
  		background-color: black;
  	}
  	.marquee {
    width: 450px;
    line-height: 50px;
    
    white-space: nowrap;
    overflow: hidden;
    box-sizing: border-box;
}
body
{
	background-image: url(16.jpg);
	background-size: cover;
	background-repeat: no-repeat;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

  </style>
<script async src="https://cse.google.com/cse.js?cx=000751494588969139256:4vixoqcogbv"></script>
</head>
<body>
<div class="header-top" style="background-color: skyblue;">
			<div class="container" >
				<div class="row" >
					<div class="col-lg-6 header-top-left"  >
						<div class="top-info ">
							<h3>DashBoard</h3>
              <h3><a href="your.php">your properties</a></h3>
						</div>
					</div>
					
						<div class="user-panel">
							<a href="logout.php"><?php  echo $_SESSION["username"]."  ";?><i class="fa fa-user-circle-o"></i>Logout</a>
             <?php  $df=$_SESSION["id"];
             ?>

						</div>
					</div>
				</div>
			</div>
		</div>


<marquee scrolldelay="40" scrollamount="10" speed="255">
<div class="jumbotron">
  <h2>WELCOME TO world's number 1 property selling site</h1>
  <h3>Find your dream home</h3>
</div>
</marquee>

<div class="b">
	<div class="topnav">
  <a class="active" href="buy.php" target="_self">BUY</a>
  <a class="active" href="RENT.php">RENT</a>
  <a class="active" href="#contact">PG</a>
  <div class="search-container">
  	<div class="gcse-search">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
</div>
</div>


<hr>

  <div class="ab">
    <h1 align="center" style="color: lime">OUR PARTNERS</h1>
  </div>
    <marquee>
    <a href="https://www.primevideo.com/"><img src="gh.jpg"></a>
    <a href="https://www.dlf.in/"><img src="hg.jpg"></a>
    <a href="https://www.adityabirla.com/"><img src="birla.jpg"></a>
   <a href="https://www.surya.edu.in/"> <img src="sgi.jpg"></a>
    <a href="https://www.tata.com/"><img src="tata.jpg"></a>

</marquee>
  </div>
<hr>
<div class="jumbotron card card-image" style="background-color: blanchedalmond ; opacity: 0.6">
 
 <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4" >
      <a href="https://www.facebook.com/"><img src="f.png"></img></a><br><br>
           <a href="https://www.pinterest.com/"><img src="k.jpg"></img></a><br><br>
             <a href="https://www.magicbricks.com/"><img src="mb.jpg"></img></a><br><br>
              <a href="https://www.olx.in/"><img src="olx.jpg"></img></a>
              
              
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4" >
       <ul>
              <li><a href="">Mumbai</a></li>
              <li><a href="">Delhi</a></li>
              <li><a href="">Chennai</a></li>
              <li><a href="">Kolkata</a></li>
              <li><a href="">Banglore</a></li>
            </ul>
            <ul>
              <li><a href="">Chandigarh</a></li>
              <li><a href="">Pune</a></li>
              <li><a href="">Jaipur</a></li>
              <li><a href="">Kochi</a></li>
              <li><a href="">Ooty</a></li>
            </ul>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
      <h5 class="fw-title">NEWSLETTER</h5>
            <p>Subscribe your email to get the latest news and new offer also discount</p>
            <form class="footer-newslatter-form">
              <input type="text" placeholder="Email address">
              <button><i class="fa fa-send"></i></button>
            </form>
          </div>
  </div>
</div>

</body>
</html>
