 
<?php
session_start();
@$submitbutton=$_POST['submitbutton'];
@$number=$_POST['cardnumber'];

function validatecard($number)
 {
    global $type;

    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );

    if (preg_match($cardtype['visa'],$number))
    {
  $type= "visa";
        return 'visa';
  
    }
    else if (preg_match($cardtype['mastercard'],$number))
    {
  $type= "mastercard";
        return 'mastercard';
    }
    else if (preg_match($cardtype['amex'],$number))
    {
  $type= "amex";
        return 'amex';
  
    }
    else if (preg_match($cardtype['discover'],$number))
    {
  $type= "discover";
        return 'discover';
    }
    else
    {
        return false;
    } 
 }

validatecard($number);

?>
<?php

if ($submitbutton)
{
if (validatecard($number) !== false)
{
echo "<green> $type detected. credit card number is valid</green>";
 
 
 
include('indexDB.php');
if(isset($_POST['username']))
{
    $uname =$_POST['username'];
}
$fid=$_SESSION["flat_id"];
$bname=$_SESSION["username"];
$amount=$_SESSION["amt"];
$ss1="SELECT UID FROM login where username=$bname";

$s1 = "SELECT uid,bid FROM flat  where flat_id=$fid";
$result = $conn->query($s1);
$row = mysqli_fetch_assoc($result);
if($row['bid']==NULL)
{
    $j=$row['uid'];
}
else
{
    $j=$row['bid'];
}
 $name=$_POST['name'];
  $cardnumber=$_POST['cardnumber'];

  $expm=$_POST['expm'];

$sql = "INSERT INTO payment(UID, buyer,amount,name,cardnumber,expm) VALUES ($j,'$bname',$amount,'$name',$cardnumber,$expm)";

if(mysqli_query($conn, $sql))
{
    echo "Records added successfully.";
 $sqq="SELECT * FROM cardrent where 1";
$kkk=$conn->query($sqq);
$row11=mysqli_fetch_array($kkk,MYSQLI_ASSOC);
   $sq="SELECT * FROM payment natural join cardrent WHERE payment.amount=cardrent.rent_amount and amount=$amount" ;

$kk=$conn->query($sq);

$row1=mysqli_fetch_array($kk,MYSQLI_ASSOC) ;



   echo $sql1="INSERT INTO buyer(username,location,city) VALUES ('".$bname."','".$row1['location']."','".$row1['city']."')";
die();
    if(mysqli_query($conn,$sql1))
    {
      echo "record updtaed";
    }
    else
    {
      echo "".mysqli_error($conn);
    }

$cv="UPDATE flat set uid=".$_SESSION['id']."";
$xc=$conn->query($cv);
$f="SELECT * FROM cardrent natural join payment WHERE cardrent.totalcost=payment.amount and amount=$amount";
$d=mysqli_query($conn,$f);
$w=mysqli_fetch_array($d,MYSQLI_ASSOC);
$sql2="UPDATE buyer SET payment=".$cardnumber." where location='".$w['location']."' ";

$kk=$conn->query($sql2);
  
header('Location: your1.php');
}
else
{
echo " <red>This credit card number is invalid</red>";
}
}
}
?>

<html>
<head></head>
<body>
 <div class="col-10">
                        <h1>DashBoard</h1>
                    </div>
          <div class="col-2">
            <?php echo $_SESSION['username']?><a href="logout.php"><i class="fa fa-sign-in"></i> Logout</a>
          </div>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
         <form action="" method="POST">
            <div class='form-row'>
              <div class='col-xs-12'>
                <label class='control-label'>Name on Card</label>
                <div class='col-xs-4 form-group expiration required'>
                    <input class='form-control' size='4' type='text' name="name">
                    </div>
                    
                <div class='col-xs-4 form-group expiration required'>
                <div>Hi!</div>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                :<input type="text" name="cardnumber" value='<?php if ($submitbutton) { echo "$number";} ?>'/  > 
  
              </div>
            </div>
            <div class='form-row'>
             
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'> </label>
                <input  type="year" name="expm" class='form-control card-expiry-year' placeholder='YYYY' size='4'>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'> </label>
                <div></div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12'>
                <div class='form-control total btn btn-info'>
                  Total:
                  <span class='amount'><?php echo $_SESSION["amt"]?></span>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <input type="submit" name="submitbutton"  value="pay" />
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>
</form>
</body>
<style type="text/css">
  input['submit'] {
  margin-top: 10px;
}
</style>
