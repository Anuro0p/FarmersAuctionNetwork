<html>
<head></head>
<body>
<?php
include 'dbconfig.php';
$name=$_POST['name'];
$phone=$_POST['phone'];
$passwd=$_POST['password'];
$password=md5($passwd);
$address=$_POST['address'];
$role=$_POST['role'];
$year = date('Y');
if($role=="farmer")
{
    $sql5="INSERT INTO farmer(fname,phone,passwd,address,isVerified) values ('$name',$phone,'$password','$address',0)";
    $result5=mysqli_query($con,$sql5);
    if($result5==TRUE)
    {
    echo"<script>
    alert('Applied Successfuly');
    window.location='login.php';
    </script>";
    $sql2="UPDATE count set count=count+1 where year=$year";
    $result1=mysqli_query($con,$sql2);
    }
    else
    {
    echo"<script>alert('Error in Registering');
    window.location='registeration.php';
    </script>";
    }
}
else if($role=="retailer")
{
    $sql5="INSERT INTO retailer(rname,phone,passwd,address,isVerified) values ('$name',$phone,'$password','$address',0)";
    $result5=mysqli_query($con,$sql5);
    if($result5==TRUE)
    {
    echo"<script>
    alert('Applied Successfuly');
    window.location='login.php';
    </script>";
    $sql2="UPDATE count set count=count+1 where year=$year";
    $result1=mysqli_query($con,$sql2);
    }
    else
    {
    echo"<script>
    alert('Error in Registering');
    window.location='registeration.php';
    </script>";
    }
}


?>
</body>
</html>