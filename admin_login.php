<?php
include ("dbconfig.php");
session_start();
if(isset($_POST['submit']))
{
$f=0;
$username=$_POST['username'];
$pass=$_POST['password'];
$password=md5($pass);
	$_SESSION['username']=$username;
	$sql1="select username,passwd from admin where username='$username'";
	$result1=mysqli_query($con,$sql1);
    $data1=mysqli_fetch_assoc($result1);
    $count1 = mysqli_num_rows($result1);	
      if($count1 > 0)
        {
            if($data1["passwd"]==$password)
            {
                $_SESSION['username']=$username; 
                header("Location: admin/admin_index.php");
                exit;
            }
            else
            {
                $errmsg="Invalid password";
            }
        }
        else
        {
            $errmsg="Invalid Email";
        }
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



      <title>Admin Login</title>
      
      
      
   </head>
   
   <body >
	


   <main>
    <div class="container-fluid">
      <div class="  row">
          <div class="col-3"></div>
        <div class="  col-sm-6  login-section-wrapper my-col">
            <div class="col  login-section-wrapper">
          <div class="brand-wrapper my-col " style="padding-left: -10px; margin-left: -20px; align-self: start;" >
            <img src="assets\logo1-bg.png" style="height: 100px; width:270px;" id="log" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto" style="padding-top: 0px;">
            <h1 style="font-size: 1.5em;text-align:center; " class="login-title mb-4">Admin Login</h1>
            <form action = "" method = "post">
              <div class="form-group">
                <label style="color:black;" for="email" >Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username">
              </div>
              <div class="form-group mb-4" >
                <label style="color:black;" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your passsword">
              </div>
              <div  style="color:red;">
              <?php
            if(isset($errmsg)){
              echo $errmsg;
            }?>
            </div>
              <input name="submit" id="login" class="btn btn-block login-btn" type="submit" value="Login">
            </form>
        </div>
          </div>
        </div>
        <div class=" col-sm-3 px-0 d-none d-sm-block">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


   </body>
</html>