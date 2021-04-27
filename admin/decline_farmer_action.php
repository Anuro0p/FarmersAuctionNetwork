<?php
include ("dbconfig.php");
include ("session.php");
$id=$_GET['id1'];
$sql2="delete from farmer where fid=$id";
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