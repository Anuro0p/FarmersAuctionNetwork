<?php
include ("session.php");
include ("dbconfig.php");
session_start();
$id=$_GET['id1'];
$sql2="delete from retailer where rid=$id";
$result1=mysqli_query($con,$sql2);
if($result1==TRUE)
{
echo"<script>
alert('Declined');
window.location='verify.php';
</script>";
}
else
{
echo"<script>
alert('Decline Error'); 
window.location='verify.php';
</script>";
}
?>