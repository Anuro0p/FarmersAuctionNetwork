<?php
echo"abcd";

session_start();
$did =$_GET['did'];
$matte =$_GET['matte'];

 include_once("dbconfig.php");

    $insertquery="UPDATE retailerdemand set status=3 where did = $did;";
    $result=mysqli_query($con,$insertquery);


echo"<script>alert('SUCCSESS...!')</script>";

if($matte==1){
    header("Location: CurrentDemands.php?flg=2");
}
else{
    header("Location: acceptedDemands.php?flg=2");
}


?>