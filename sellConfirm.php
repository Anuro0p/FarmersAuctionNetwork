<html>
<body>
<?php
$cr="SUCCESS...!"
?>
<script type="text/javascript">
    var foo = <?php echo json_encode($cr); ?>;
    alert(foo);
    </script>


<?php


session_start();
$fid=$_SESSION['fid'];
$message=$_GET['message'];
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

$insertquery="UPDATE retailerdemand set offerprize=$offerprice,message='$message',fid=$fid , status=1 where did = $did;";
$result=mysqli_query($con,$insertquery);

echo"<script>alert('SUCCSESS...!')</script>";
if($result){
    header("Location: demandTab.php?flg=1");
}


?>





</body>
</html>
