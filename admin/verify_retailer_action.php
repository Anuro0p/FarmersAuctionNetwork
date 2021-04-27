<?php
include ("session.php");
include ("dbconfig.php");
session_start();
$id=$_GET['id1'];
$sql2="UPDATE retailer set isVerified=1 where rid=$id";
$result1=mysqli_query($con,$sql2);
if($result1==TRUE)
{
echo"<script>
alert('verified Successfully');
window.location='verify.php';
</script>";
}
else
{
echo"<script>
alert('Verification Error');
window.location='verify.php';
</script>";
}
?>