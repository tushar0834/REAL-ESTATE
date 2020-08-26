<?php
include('indexDB.php');
$username = $name = $surname = $email = $password = $cpassword = $phone = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$usernameErr = $nameErr = $surnameErr = $emailErr = $passwordErr = $cpasswordErr = $phoneErr = "";
$b=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
    $b=false;
  } else {
    $name = test_input($_POST["name"]);
     if (!preg_match("/^[a-zA-Z]*$/",$name) || $name=='') {
      $nameErr = "*Only letters allowed ";
      $b=false; 
    }
  }
  if (empty($_POST["surname"])) {
    $surnameErr = "*Surname is required";
    $b=false;
  } else {
    $surname = test_input($_POST["surname"]);
     if (!preg_match("/^[a-zA-Z]*$/",$surname) || $surname=='') {
      $surnameErr = "*Only letters allowed ";
      $b=false; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $b=false;
  } else {
    $email = test_input($_POST["email"]);
     if (!preg_match("/^[a-zA-Z0-9\.]*@[a-z\.]{1,}[a-z]*$/",$email) || $email=='') {
      $emailErr = "*Enter a Valid Email"; 
      $b=false;
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "*Contact Number is required";
    $b=false;
  } else {
    $phone = test_input($_POST["phone"]);
    if(!preg_match("/^[0-9]{10,10}$/",$phone) || $phone==''){
    	$phoneErr = "*Enter A Valid Contact Number";
    	$b=false;
    }
  }
}
if($b==true && isset($_POST['submit']))
{
	$username = $name = $surname = $email = $password = $cpassword = $phone = "";

$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['password_repeat'];
   $sql = "insert into login(username,password,name,surname,email,phone) values('$username','$password','$name','$surname','$email',$phone)";
  if(mysqli_query($conn, $sql)){
   header('Location: loginuser.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Real-Estate</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="formhack.css">

	<meta charset="UTF-8">
	<meta name="description" content="REAL ESTATE">
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
	<script type="text/javascript">
			function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";	
    }
}	
	</script>
	<style type="text/css">
		body{
background-repeat:no-repeat;
background-image:url("km.jpg");
background-size:cover;
background-attachment:fixed;
color: black;

}

	</style>
	<script src="script.js"></script>
</head>
<body>


	<div class="container" style="text-align: center; opacity: 0.7">
		<form class="registration"  method="post" action="registe.php" >
			
			

<h1><img src="img/LOGO.png"></img></h1>







<label for="FIRSTNAME">
				<h3><b>FIRSTNAME</b></h3>
					<input type="text" name="name" size="100">
<span class="error"><?php echo $nameErr; ?></span>
</label>
<br><br>


<label for="SURNAME">
				<span><h3><b>SURNAME</b></h3></span>

				<input type="text" name="surname" size="100">
<span class="error"><?php echo $surnameErr; ?></span>
</label>
<br><br>


			<label for="username">
				<span><b><h3>Username</b></h3></span>

				<input type="text"   id="username" name="username" minlength="3" size="100" required>

				<ul class="input-requirements">
					<li>At least 3 characters long</li>
					<li>Must only contain letters and numbers (no special characters)</li>
				</ul>
			</label>
			<br>
<label for="EMAIL">
				<span><h3><b>EMAIL</b></h3></span>
<input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" size="100" /> <div class="status" id="status"></div>
<span class="error"><?php echo $emailErr; ?></span>

</label>
<br><br>

			<lablel for="phone">
<div align="center">
<span><h3><b>CONTACT</b></h3></span>
<input type="text" name="phone" size="30">
<span class="error"><?php echo $phoneErr; ?></span>
</div>
</lablel>
<br>




<br>

			<label for="password">
				<span><h3><b>PASSWORD</b></h3></span>

				<input type="password"  id="password" name="password" maxlength="100" minlength="8" size="100" required>

				<ul class="input-requirements">
					<li>At least 8 characters long (and less than 100 characters)</li>
					<li>Contains at least 1 number</li>
					<li>Contains at least 1 lowercase letter</li>
					<li>Contains at least 1 uppercase letter</li>
					<li>Contains a special character (e.g. @ !)</li>
				</ul>
				<span class="error"><?php echo $passwordErr; ?></span>
			</label>
<br>
			<label for="password_repeat">
				<span><h3><b>Repeat Password</b></h3></span>
				<input type="password" name="password_repeat" id="password_repeat" maxlength="100" minlength="8" size="100" required>
				<span class="error"><?php echo $cpasswordErr; ?></span>
			</label>

			<br><br>
			
<div align="center">
<input type="submit"  name="submit" size="50">
<input type="reset" value="Reset" size="50">
</div>

    
</form>
</div>
</tbody>
</body>
</html>
