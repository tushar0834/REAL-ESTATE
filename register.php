<?php session_start();
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
    if (empty($_POST["username"])) {
        $usernameErr = "*Username is required";
        $b=false;
      } else {
        $username = test_input($_POST["username"]);
         if (!preg_match("/^[a-zA-Z0-9]*$/",$username) || $username=='') {
          $usernameErr = "*Only letters and numbers allowed";
          $b=false; 
        }
      }
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
    $sql = "insert into login(username,password,name,surname,email,phone) values('$username','$password','$name','$surname','$email',$phone)";
		$res=$conn->query($sql);
    $sql1="select uid from login where username='$username'";
    $result=$conn->query($sql1);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['username']=$username;
    $_SESSION['type']='normal';
		$_SESSION['id']=$row['uid'];
		header('Location: normalHomeSale.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>REAL ESTATE</title>
	<meta charset="UTF-8">
	<meta name="description" content="REAL ESTATE">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
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
function validatephone(phone) 
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}


function phonenumber(phone)
{
  var phoneno = /^\d{10}$/;
  if(inputtxt.value.match(phoneno))
  {
      return true;
  }
  else
  {
     alert("Not a valid Phone Number");
     return false;
  }
  }
  /* ----------------------------

  CustomValidation prototype

  - Keeps track of the list of invalidity messages for this input
  - Keeps track of what validity checks need to be performed for this input
  - Performs the validity checks and sends feedback to the front end

---------------------------- */
function CustomValidation() {
function CustomValidation(input) {
  this.invalidities = [];
  this.validityChecks = [];

  //add reference to the input node 
  this.inputNode = input;

  //trigger method to attach the listener
  this.registerListener();
}

CustomValidation.prototype = {
@@ -40,7 +46,30 @@ CustomValidation.prototype = {

      } // end if requirementElement
    } // end for
  },
  checkInput: function() { // checkInput now encapsulated

    this.inputNode.CustomValidation.invalidities = [];
    this.checkValidity(this.inputNode);

    if ( this.inputNode.CustomValidation.invalidities.length == 0 && this.inputNode.value != '' ) {
      this.inputNode.setCustomValidity('');
    } else {
      var message = this.inputNode.CustomValidation.getInvalidities();
      this.inputNode.setCustomValidity(message);
    }
  },
  registerListener: function(){ //register the listener here

    var CustomValidation = this;

    this.inputNode.addEventListener('keyup', function() {
      CustomValidation.checkInput();
    });


  }

};


@@ -123,31 +152,6 @@ var passwordRepeatValidityChecks = [
];



/* ----------------------------
  Check this input
  Function to check this particular input
  If input is invalid, use setCustomValidity() to pass a message to be displayed
---------------------------- */

function checkInput(input) {

  input.CustomValidation.invalidities = [];
  input.CustomValidation.checkValidity(input);

  if ( input.CustomValidation.invalidities.length == 0 && input.value != '' ) {
    input.setCustomValidity('');
  } else {
    var message = input.CustomValidation.getInvalidities();
    input.setCustomValidity(message);
  }
}



/* ----------------------------
  Setup CustomValidation
@@ -161,13 +165,13 @@ var usernameInput = document.getElementById('username');
var passwordInput = document.getElementById('password');
var passwordRepeatInput = document.getElementById('password_repeat');

usernameInput.CustomValidation = new CustomValidation();
usernameInput.CustomValidation = new CustomValidation(usernameInput);
usernameInput.CustomValidation.validityChecks = usernameValidityChecks;

passwordInput.CustomValidation = new CustomValidation();
passwordInput.CustomValidation = new CustomValidation(passwordInput);
passwordInput.CustomValidation.validityChecks = passwordValidityChecks;

passwordRepeatInput.CustomValidation = new CustomValidation();
passwordRepeatInput.CustomValidation = new CustomValidation(passwordRepeatInput);
passwordRepeatInput.CustomValidation.validityChecks = passwordRepeatValidityChecks;


@@ -181,18 +185,13 @@ passwordRepeatInput.CustomValidation.validityChecks = passwordRepeatValidityChec

var inputs = document.querySelectorAll('input:not([type="submit"])');

for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('keyup', function() {
    checkInput(this);
  });
}

var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('registration');

function validate() {
  for (var i = 0; i < inputs.length; i++) {
    checkInput(inputs[i]);
    inputs[i].CustomValidation.checkInput();
  }
}
</script>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->

	
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
					<div class="site-navbar">
						
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<style type="text/css">
body{
background-repeat:no-repeat;
background-image:url("img/contact.jpg");
background-size:cover;
background-attachment:fixed;
color: black;
}
input[type=text],input[type=date],input[type=password],input[type=number]  {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color: #e0e0d1;
    color:black;
}

 input[type=submit], input[type=reset] {
    background-color: #e0e0d1;
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
	 background-color: pink;
    border: none;
    color: blue;
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
    background-color:pink;
    color:black;
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
.tbody
{
	background-color: 
}


datalist {
  font-family: var(--fh-font-family);
  font-size: var(--fh-font-size);
}

label {
  display: block;
  margin: var(--fh-layout-margin);
  text-align: var(--fh-layout-text-align);
  margin-bottom: 20px;
  position: relative;
  padding: 0 20px;
}



/* Input & Textarea ------------------ */

/* Fields with standard width */

/* Fields with standard height */

/* .checkbox-container {
/*  display: block;
/*  text-align: center;
/* }
/* Select ------------------ */

select {
  height: var(--fh-input-height);

  -webkit-appearance: var(--fh-select-vendor-styling, menulist);
  -moz-appearance: var(--fh-select-vendor-styling, menulist);
  -ms-appearance: var(--fh-select-vendor-styling, menulist);
  -o-appearance: var(--fh-select-vendor-styling, menulist);


}

select[multiple] {
  height: auto;
  min-height: var(--fh-input-height);
  padding: 0;
}

select[multiple] option {
  margin: 0;
  padding: calc( var(--fh-input-height) / 5 );
}

/* Fieldset ------------------ */

fieldset {
  padding: 0;
  border: 0;
}

legend {
  padding: 0;
  font-weight: inherit;
}

/* Buttons, Input Type Submit/Reset ------------------ */










/* Custom ------------------ */


input:not([type="submit"]):valid {
  border-color: #2ecc71;
}


/* Hide and show related .input-requirements when interacting with input */

input:not([type="submit"]) + .input-requirements {
  overflow: hidden;
  max-height: 0;
  transition: max-height 1s ease-out;  
}

input:not([type="submit"]):hover + .input-requirements,
input:not([type="submit"]):focus + .input-requirements,
input:not([type="submit"]):active + .input-requirements {
  max-height: 1000px; /* any large number (bigger then the .input-requirements list) */
  transition: max-height 1s ease-in;
}



</style>
</head>


 <br><br><br><br><br><br><br><br><br><br><br>
<form id="form" method="post" action="register.php" >

<table cellpadding="7" width="50%" border="0" align="center"cellspacing="2" color="white">

    <!-- I want another button here, center to the tile-->
<tbody bgcolor="blanchedalmond">


<tr>
<td colspan=2>
<center><img src="img/LOGO.png"></img></center>
</td>
</tr>
<tr>
<td colspan=2>
<center><font size=5><b>REGISTER</b></font></center>
</td>
</tr>

<tr>
<td><b>NAME:</b></td>
<td><input type="text" name="name" size="30">
<span class="error"><?php echo $nameErr; ?></span>
<br><br>
</td>
</tr>
<tr>
<td><b>SURNAME:</b></td>
<td><input type="text" name="surname" size="30">
<span class="error"><?php echo $surnameErr; ?></span>
<br><br>
</td>
</tr>
<tr>
<td><label for="username">
  <span>Username</span></td>
<td><input type="text" id="username" minlength="3" required  onchange="CustomValidation(this.input)">

        <ul class="input-requirements">
          <li>At least 3 characters long</li>
          <li>Must only contain letters and numbers (no special characters)</li>
        </ul>
      </label>
<br><br>
</td>
</tr>



<tr>
<td>EMAIL ID:</td>
<td><input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" /> <div class="status" id="status"></div></td>
<span class="error"><?php echo $emailErr; ?></span>
  <br><br>
</tr>
<tr>

</td>
</tr>



<tr>
<td><b>PASSWORD:</b></td>
<td><input type="password" id="password" maxlength="100" minlength="8" required>

        <ul class="input-requirements">
          <li>At least 8 characters long (and less than 100 characters)</li>
          <li>Contains at least 1 number</li>
          <li>Contains at least 1 lowercase letter</li>
          <li>Contains at least 1 uppercase letter</li>
          <li>Contains a special character (e.g. @ !)</li>
        </ul>
      </label>
<span class="error"><?php echo $passwordErr; ?></span>
  <br><br>
</td>
</tr>
<tr>
<td><b> CONFIRM PASSWORD:</b></td>
<td><input type="password" name="confirm" size="30">
<span class="error"><?php echo $cpasswordErr; ?></span>

  <br><br>
</td>
</tr>
<tr>
<td><input type="reset" value="Reset"></td>
<td><input type="submit" value="Register" name="submit">
<div style = "font-size:20px; color:#cc0000; margin-top:10px"></div>
</td>
</tr>
</tbody>
</table>
<br><br><br><br><br><br><br><br><br><br>

</form>




 
</body>
</html>
