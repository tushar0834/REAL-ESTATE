<!DOCTYPE html>
<html>
<head>
	<title>REAL-ESTATE</title>
<style type="text/css">
	body
	{
	background-image: url(b23.jpg);
	
	background-repeat: none;
}
th
{
	font-size: 25px;
	font-style: bold;
	color: darkgray;
	background-color: black;
}
td
{
	color: darkgray;
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
		</div><br>
<table class="table" border="2" cellpadding="53px;" align="center">
	<tbody>
		<tfoot>
	<tr>
		<th>LOCATION</th>
		<th>CITY</th>
		<th>NAME</th>
		<th>FLAT</th>
	</tr>

<?php
include("indexDB.php");
$k='';
$c=$_SESSION['username'];
 $s="SELECT location from buyer where username='".$c."'";

$m=$conn->query($s);
$k=mysqli_fetch_array($m,MYSQLI_ASSOC);
 $sql="SELECT * FROM flat natural join buyer natural join login   where flat.location=buyer.location AND buyer.username=login.username and username='".$c."'";

$kl=$conn->query($sql);

while($row=mysqli_fetch_array($kl,MYSQLI_ASSOC))
{
	
	?>
	<tr>
<td>
	<h3><?php echo $row['location'] ?></h3>
</td>
<td><h3>
	<?php echo $row['city'] ?>
</h3></td>
<td><h3>
	<?php echo $row['name']."  " ; echo $row['surname']?>
</h3></td>
<td>
	<?php echo "<img src='",$row['image'],"'  />"?>
</td>
</tr>
<?php	
}
?>
 
 
</tfoot>	
</tbody>
</table>
</body>
</html>

	
	