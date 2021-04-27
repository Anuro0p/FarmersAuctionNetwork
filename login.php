<?php
include ("dbconfig.php");
session_start();
if(isset($_POST['submit']))
{
$f=0;
$phone=$_POST['phone'];
$pass=$_POST['password'];
$password=md5($pass);
	$_SESSION['phone']=$phone;
	$sql1="select phone,passwd from retailer where phone=$phone";
	$result1=mysqli_query($con,$sql1);
    $data1=mysqli_fetch_assoc($result1);
    $count1 = mysqli_num_rows($result1);	
      if($count1 > 0)
        {
            if($data1["passwd"]==$password)
            {
                $_SESSION['phone']=$phone; 
                header("Location: index.html");
                exit;
            }
            else
            {
                $errmsg="Invalid password";
            }
        }
        else
        {
            $f=1;
        }
    $sql2="select phone,passwd from farmer where phone=$phone";
	$result2=mysqli_query($con,$sql2);
    $data2=mysqli_fetch_assoc($result2);
    $count2 = mysqli_num_rows($result2);
    if($count2 > 0)
    {
        if($data2["passwd"]==$password)
        {
            $_SESSION['phone']=$phone; 
            header("Location: index.html");
            exit;
        }
        else
            {
                $errmsg="Invalid password";
            }
    }
    else
        {
            $f=1;
        }
        if($f==1)
        $errmsg="Phone no Invalid";
}
?>
<html>
   
   <head>


   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/login.css">
  <link rel="stylesheet" href="assets/styles.css">



      <title>Login Page</title>
      
      
      
   </head>
   
   <body >
	


   <main>
    <div class="container-fluid">
      <div class="  row">
        <div class="  col-sm-6  login-section-wrapper my-col">
            <div class="col  login-section-wrapper">
          <div class="brand-wrapper my-col " style="padding-left: -10px; margin-left: -20px; align-self: start;" >
            <img src="assets\logo1-bg.png" style="height: 100px; width:270px;" id="log" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto" style="padding-top: 0px;">
            <h1 style="font-size: 1.5em; " class="login-title mb-4">Login</h1>
            <form action = "" method = "post">
              <div class="form-group">
                <label style="color:black;" for="email" >Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your Phone no">
              </div>
              <div class="form-group mb-4" >
                <label style="color:black;" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your passsword">
              </div>
              <?php
            if(isset($errmsg)){
              echo $errmsg;
            }?>
              <input name="submit" id="login" class="btn btn-block login-btn" type="submit" value="Login">
            </form>
            <p class="login-wrapper-footer-text">Don't have an account? <a href="registration" class="text-reset">Register here</a></p>
        </div>
          </div>
        </div>
        <div class=" col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/22062.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


   </body>
</html>