 
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
  <tbody>
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
         <form action="" method="POST">
          <div class=' form-group expiration required'>
                <div>Hi!</div>
                </div>
            <div class='form-row'>
              <div class=' form-group expiration required'>
              <div class='col-xs-12'>
                <label class='control-label'>Name on Card</label>
                
                    <input class='form-control'  type='text' name="name">
                    </div>
                    
                
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                :<input type="text" name="cardnumber" class="form-control" value='<?php if ($submitbutton) { echo "$number";} ?>'/  > 
  
              </div>
            </div>
            <div class='form-row'>
             
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>EXPIRATION DATE </label>
                <input  type="year" name="expm" class='form-control card-expiry-year' placeholder='YYYY' size='4'>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'> </label>
                <div></div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 '>
                <label class='control-label'>CVV</label>
                :<input type="text" maxlength="3" size="3" value='<?php if ($submitbutton) { echo "$number";} ?>'/  > 
  
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12'>
                <div style="background-color: skyblue; text-align: center; font-size: 24;">
                  Total:
                  <?php echo $_SESSION["amt"]?><br>
                </div>
              </div>
            </div>
           
            
            <div class='form-row'>
              <div class='col-md-12 form-group' align="center"><br>
                <input type="submit" name="submitbutton" class="btn-primary" value="pay" />
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
</tbody>
</body>
<style type="text/css">
  input['submit'] {
  margin-top: 10px;
}
</style>
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

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$cv="UPDATE flat set uid=".$_SESSION['id']."";
$xc=$conn->query($cv);
$f="SELECT * FROM cardsale natural join payment WHERE cardsale.totalcost=payment.amount and amount=$amount";
$d=mysqli_query($conn,$f);
$w=mysqli_fetch_array($d,MYSQLI_ASSOC);
$sql2="INSERT INTO buyer(username,location,city,payment) VALUES ('".$bname."','".$w['location']."','".$w['city']."','".$cardnumber."')";

$kk=$conn->query($sql2);
  
header('Location: your.php');
mysqli_close($conn);

}
else
{
echo " <red>This credit card number is invalid</red>";
}
}
?>