<!DOCTYPE html>
<html>
<head>
	<title>REAL-ESTATE</title>
<style type="text/css">
	body
	{
	background-image: url(y2.jpg);
	
	background-repeat: none;
}
</style>



</head>
<body>
<div class="header-top" style="background-color: skyblue;">
			<div class="container" >
				<div class="row" >
					<div class="col-lg-6 header-top-left"  >
						<div class="top-info ">
							<h3>DashBoard</h3>
						</div>
					</div>
					
						<div class="user-panel">
							<a href="logout.php"><?php session_start(); echo $_SESSION["username"]."  ";?><i class="fa fa-user-circle-o"></i>Logout</a>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
include("indexDB.php");
$k='';
$c=$_SESSION['username'];
 $s="SELECT location from buyer where username='".$c."'";

$m=$conn->query($s);
$k=mysqli_fetch_array($m,MYSQLI_ASSOC);
$sql="SELECT * FROM flat natural join buyer   where flat.location=buyer.location and username='".$c."'";

$kl=$conn->query($sql);

while($row=mysqli_fetch_array($kl,MYSQLI_ASSOC))
{
	echo $row['location'],"<br>";
	
	echo "<img src='",$row['image'],"' width='500' height='500' />","<br>";
	
	
}

 
 
	
?>
</body>
</html>