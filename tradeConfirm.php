<?php
echo"abcd";

session_start();
$fid=$_SESSION['fid'];
$offerprice=$_GET['offerprice'];
$did =$_GET['did'];
echo $message;
echo "....";
echo $fid;
echo "....";
echo $did;
echo "....";
echo $offerprice;

include_once("dbconfig.php");

$insertquery="UPDATE retailerdemand set offerprize=$offerprice,message='',fid=$fid , status=2 where did = $did;";
$result=mysqli_query($con,$insertquery);

echo"<script>alert('SUCCSESS...!')</script>";
if($result){
    header("Location: demandTab.php?flg=2");
}


?>