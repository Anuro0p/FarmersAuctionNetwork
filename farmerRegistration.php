<?php
include_once("dbConfig.php");
if(isset($_POST['Submit'])) {
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $password= md5($password);

 if(empty($name) || empty($email) || empty($password)) {
    if(empty($name)) {
    echo "<font color='red'>Name field is empty.</font><br/>";
    echo '<script>alert("Name field is empty")</script>';
    }
   
    if(empty($email)) {
    echo "<font color='red'>Email field is empty.</font><br/>";
    echo '<script>alert("Email field is empty")</script>';
    }
   
    if(empty($password)) {
    echo "<font color='red'>Password field is empty.</font><br/>";
    echo '<script>alert("Password field is empty")</script>';
    }

    }
else {

    if(mysqli_query($mysqli, "INSERT INTO userregistration(name,email,password)
    VALUES('$name','$email','$password')"))
    echo"success.";

}
}

?>





<html>
   
   <head>


   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">



      <title>Signup</title>
      
      
      
   </head>
   
   <body >
	


   <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
        <div class="brand-wrapper my-col" style="align-self: start;" >
            <img src="assets/images/covidlogo1.png" style="height: 60px;" id="log" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Sign Up</h1>
            <form action = "userRegistration.php" method = "post" name="form1">
              <div class="form-group">
                <label style="color:black;" for="name" >name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name">
              </div>
              <div class="form-group">
                <label style="color:black;" for="email" >Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="form-group mb-4" >
                <label style="color:black;" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
              </div>
              <input name="Submit" id="login" class="btn btn-block login-btn" type="submit" value="Signup">
            </form>
            <p class="login-wrapper-footer-text">Already have an account? <a href="http://localhost/corona/userLogin.php" class="text-reset">Login</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/login2.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


   </body>
</html>