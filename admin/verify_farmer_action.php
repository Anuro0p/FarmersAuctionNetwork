<?php
include ("dbconfig.php");
session_start();
$id=$_GET['id1'];
$sql2="UPDATE farmer set isVerified=1 where fid=$id";
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
</script>";
}
?>