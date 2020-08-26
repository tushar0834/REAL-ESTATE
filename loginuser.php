<?php
   include("indexDB.php");
   session_start();
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    $username='';$password='';$b=true;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['username']))
				$username=test_input($_POST['username']);
				else $b=false;
        if(isset($_POST['password']))
				$password=test_input($_POST['password']);
				else $b=false;
        if(isset($_POST['type']))
						$type=test_input($_POST['type']);
						else $b=false;
				$tablename='';$id='';
				if(empty($_POST['username']))
				$b=false;
				if($b==false)
				{
					header('Location: loginuser.php');
				}
        if($type=='normal')
        {
            $id='uid';
            $tablename='login';
        }
        else if($type=='builder')
        {
            $id='bid';
            $tablename='login_builder';
        }
        $q="select $id,password from $tablename where username='$username'";
        echo $q;
        $result=$conn->query($q);
        if($result==true)
        {
            $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
        else
        {
					header('Location: loginuser.php');
        }
        if($row['password']==$password)
        {
            $_SESSION['username']=$username;
            $_SESSION['type']=$type;
            if($id=='uid' && $b==true)
            {
                $_SESSION['id']=$row['uid'];
               header('Location: welcome.php');
            }
            if($id=='bid' && $b==true)
            {
                $_SESSION['id']=$row['bid'];
                header('Location: builder.php');
            }
        }
        else
        {
            echo "Invalid Password!!!!";
            header('Location: loginuser.php');
        }
    }
?>
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

</head>
<body>
	<!-- Page Preloder -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
<div class="container">

  <div class="btn-group">
    <button type="button" class="btn btn-primary">HOME<span class="caret"></span></button>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
    </button>
    <div class="dropdown-menu">
      <div class="zay">
      <a class="dropdown-item" href="index.html" tabindex="-1">HOME PAGE</a>
  </div>

</div>
</div>
</div>
</nav>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
					<div class="row">
					
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							
							<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
							<a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
							<a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
							<a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
							<a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
						
							
						</div>
					</div>
						
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					
						
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<style type="text/css">
body{
background-repeat:no-repeat;
background-image:url("KLJ.jpg");
background-size:cover;
background-attachment:fixed;
color:red;
}
input[type=text],input[type=date],input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color: #e0e0d1;
    color:black;
}

 input[type=submit], input[type=reset] {
    background-color: red;
    border: none;
    color: black;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    font-weight:bold;
}
input[type=radio] {
    height: 15px;
    width: 15px;
    
}



select {
	 background-color: #e0e0d1;
    border: none;
    color: black;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    font-weight:bold;
}
textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color:#e0e0d1;
    color:black;
}
tbody
{
background-color: skyblue;
}
table{
 background-color:black;
  border-collapse: collapse; 
  border: 2px solid navy;
}
form{
opacity:0.7;
}
td{
font-weight:bold;
}
span
{
   color:red;
}


</style>

</head>


 <br><br><br><br><br><br><br><br><br><br><br>

<form id="form" method="post" action="loginuser.php" >

<table cellpadding="7" width="50%" border="0" align="center"cellspacing="2" color="white">

    <!-- I want another button here, center to the tile-->

<tbody >
<tr>
<td colspan=2>
<center><img src="img/LOGO.png"></img></center>
</td>
</tr>
<tr>
<td colspan=2>
<center><font size=5><b>LOGIN</b></font></center>
</td>
</tr>

<tr>
<td><b>USERNAME:</b></td>
<td><input type="text" id="username" name="username" size="30">
  
<span class="error"></span>
<br><br>
</td>
</tr>




<tr>
<td><b>PASSWORD:</b></td>
<td><input type="password" name="password" size="30">
<span class="error"></span>
  <br><br>
</td>
</tr>

<tr>
	<td><b>OPTIONS:</b>
		<td>

	<select name="type">
			
					<option value="normal" selected>NORMAL USER</option>
				    <option value="builder" >BUILDER</option>
				 
	</select>
	<br><br>
</td>
</tr>
<tr align="right">
<td align="left"><input type="reset" value="Reset"></td>
<td><input type="submit" value="Login" >
   
<div style = "font-size:20px; color:#cc0000; margin-top:10px"></div>
</td>
</tr>

</tbody> 
</table>
<br><br><br><br><br><br><br><br><br><br>
</form>







 
</body>
</html>
