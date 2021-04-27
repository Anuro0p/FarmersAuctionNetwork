<?php
echo"abcd";

session_start();
$did =$_GET['did'];

include_once("dbconfig.php");

$insertquery="UPDATE retailerdemand set offerprize=NULL, message=NULL, fid=NULL , status=0 where did = $did;";
$result=mysqli_query($con,$insertquery);

echo"<script>alert('SUCCSESS...!')</script>";
 header("Location: counterDemand.php?flg=2");


?>