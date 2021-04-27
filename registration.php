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



      <title>Registration</title>
      
      
      
   </head>
   
   <body >
   <script>
        function validateform()
        {
            var a=document.intro.cpassword.value;
            var b=document.intro.password.value;
            if(a==b){
                return true;
            }
            else{
                alert("Password must be same");
                return false;
            }

        }
    </script>

   <main>
    <div class="container-fluid">
      <div class="  row">
        <div class="  col-sm-6  login-section-wrapper my-col">
            <div class="col  login-section-wrapper">
          <div class="brand-wrapper my-col " style="padding-left: -10px; margin-left: -20px; align-self: start;" >
            <img src="assets\logo1-bg.png" style="height: 100px; width:270px;" id="log" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto" >
            <h1 style="font-size: 1.5em; " class="login-title mb-4">Registration</h1>
            <form action = "registration_action.php" method = "post" name="intro" onsubmit="return validateform()">
            <div class="form-group">
                <label style="color:black;" for="email" >Register as</label>
                <select name="role" id="role">
                        <option value="farmer">Farmer</option>
                        <option value="retailer">Retailer</option>
                </select>              
              </div>
              <div class="form-group">
                <label style="color:black;" for="email" >Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name"pattern="[A-Za-z ]*" title="Must contain only characters" required >
              </div>
              <div class="form-group">
                <label style="color:black;" for="email" >Phone</label>
                <input type="phone" name="phone" id="phone" class="form-control" placeholder="Enter your Phone no" maxlength="10" pattern="[0-9]*" title="invalid phone no" required>
              </div>
              <div class="form-group mb-4" >
                <label style="color:black;" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Passsword" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : '');"  required>
              </div>
              <div class="form-group mb-4" >
                <label style="color:black;" for="password">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter your Passsword" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : '');"  required>
              </div>
              <div class="form-group">
                <label style="color:black;" for="email" >Address</label>
                <input type="text" name="address" id="name" class="form-control" placeholder="Enter your Address" required>
              </div>
              <input name="Submit" id="login" class="btn btn-block login-btn" type="submit" value="Register">
            </form>
        </div>
          </div>
        </div>
        <div class=" col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/22062.jpg" alt="login image" class="login-img" style="margin-top:90px;">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


   </body>
</html>