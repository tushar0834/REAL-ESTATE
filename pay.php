<?php
session_start(); 
include('indexDB.php');
if(isset($_POST['username']))
{
    $uname =$_POST['username'];
}
$fid=$_SESSION["flat_id"];
$bname=$_SESSION["buyer"];
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
  $exp=$_POST['exp'];
  $expm=$_POST['expm'];

echo $sql = "INSERT INTO payment(UID, buyer,amount,name,cardnumber,exp,expm) VALUES ($j,'$bname',$amount,$name,$cardnumber,$exp,$expm)";
die();
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
?>