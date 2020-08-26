<?php 
session_start();
include('indexDB.php');
$username = $name = $surname = $email = $password = $cpassword = $phone = $lno ="";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$usernameErr = $nameErr = $surnameErr = $emailErr = $passwordErr = $cpasswordErr = $phoneErr = $lnoErr= "";
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
     if (!preg_match("/^[a-zA-Z_ ]*$/",$name) || $name=='') {
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

  if (empty($_POST["password"])) {
    $passwordErr = "*Password is required";
    $b=false;
  } else {
    $password = test_input($_POST["password"]);
     if (!preg_match("/^[a-zA-Z0-9]{10,}$/",$password) || $password=='') {
      $passwordErr = "*Enter minimum 10 characters ";
      $b=false;
    }
  }

  if (empty($_POST["confirm"])) {
    $cpasswordErr = "*Confirmation of Password is required";
    $b=false;
  } else {
    $cpassword = test_input($_POST["confirm"]);
    $password= test_input($_POST["password"]);
    if (strcmp($password,$cpassword)!=0) {
      $cpasswordErr = "*Password does not match ";
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
    if (empty($_POST["lno"])) {
      $lnoErr = "*License Number is required";
      $b=false;
    } else {
      $lno = test_input($_POST["phone"]);
      if(!preg_match("/^[0-9]{5,10}$/",$phone) || $phone==''){
        $lnoErr = "*Enter only digits";
        $b=false;
      }
  }
}
if($b==true && isset($_POST['submit']))
{
    $sql = "insert into login_builder(username,lno,password,emailid,phoneno,nameorg) values('$username', $lno,'$password','$email',$phone,'$name')";
    $res=$conn->query($sql);
    echo "insert done";
    $sql1="select bid from login_builder where username='$username'";
    $result=$conn->query($sql1);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['username']=$username;
    $_SESSION['type']='builder';
    $_SESSION['id']=$row['bid'];
    header('Location: builder.php');
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
    document.getElementById("status").innerHTML = "<span class='valid'>Thanks, you have entered a valid Email address!</span>"; 
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

</style>
</head>


 <br><br><br><br><br><br><br><br><br><br><br>

<form id="form" method="post" action="reg_builder.php" >

<table cellpadding="7" width="50%" border="0" align="center"cellspacing="2" color="white">

    <!-- I want another button here, center to the tile-->
<tbody style="background-color: blanchedalmond">

<tr>
<td colspan=2>
<center><img src="img/logo1.png"></img></center>
</td>
</tr>
<tr>
<td colspan=2>
<center><font size=5><b>REGISTER</b></font></center>
</td>
</tr>

<tr>
<td><b>USERNAME:</b></td>
<td><input type="text" name="username" size="30">
<span class="error"><?php echo $usernameErr; ?></span>
<br><br>
</td>
</tr>
<tr>
<td><b>License number</b></td>
<td><input type="text" name="lno" size="30">
<span class="error"><?php echo $lnoErr; ?></span>
<br><br>
</td>
</tr>
<tr>
<td>EMAIL ID:</td>
<td><input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" /> <div class="status" id="status"></div></td><span class="error"><?php echo $emailErr; ?></span>
  <br><br>
</td>
</tr>
<tr>
<td>PHONE NO:</td>
<td><input type="text" name="phone"  size="30">
<span class="error"><?php echo $phoneErr; ?></span>
  <br><br>
</td>
</tr>
<tr>
<td><b>Name of ORG.:</b></td>
<td><input type="text" name="name" size="30">
<span class="error"><?php echo $nameErr; ?></span>
  <br><br>
</td>
</tr>
<tr>
<td><b>PASSWORD:</b></td>
<td><input type="password" name="password" size="30">
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
