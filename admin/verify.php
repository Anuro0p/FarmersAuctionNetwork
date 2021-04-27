<?php
include ("dbconfig.php");
include ("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
#a
{
  margin-left:255px;
  background-color:#BEE7EC;
}
#b
{
  margin-top:70px;
  margin-left:20px;
  color:#000000;
}
#c{
  background-color:#B5CFDD;

}
#space{
  margin-top:100px;
}
#profile-info{
    font-weight: 600;
}
p {
  margin: 0 0 20px;
  line-height: 1.5;
}

.tab-container {
  margin: 0.5em 5em 0.5em;
  padding: 1em;
  background: #fff;
}

section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

input {
  display: none;
}

label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
}

label:before {
  font-weight: normal;
  margin-right: 10px;
}

label:hover {
  color: #888;
  cursor: pointer;
}

input:checked + label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid black;
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2{
  display: block;
}

@media screen and (max-width: 650px) {
  label {
    font-size: 0;
  }

  label:before {
    margin: 0;
    font-size: 18px;
  }
}
@media screen and (max-width: 400px) {
  label {
    padding: 15px;
  }
}

.active-auct{
padding: 1em;
background-color:#6C82BB;  
border-radius: .2em;
display: flex;
justify-content: space-around;
color: #ddd;
margin-bottom:5px;
}
li{
list-style:none;
}
</style>
</head>
<body>
    <div class="container-fluid">

    <nav class="navbar navbar-expand-xs navbar-dark fixed-top shadow p-3 mb-5" id="a">
          <ul class="navbar-nav ml-auto">
          <button type="button" class="btn btn-sm btn-light">
                <li class="nav-item">
                        <a href="logout.php" class="nav-link font-weight-bold text-dark">Logout</a>
                </li>
          </button>
          </ul>
      </nav>

    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-2 p-0 flex-shrink-1 shadow p-3" id="c">
            <nav class="navbar navbar-expand  navbar-dark flex-md-column flex-row align-items-start py-2" id="b">
                <div class="collapse navbar-collapse ">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link pl-0  font-weight-bold text-dark" href="admin_index.php"> <span class="d-none d-md-inline">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark" href="verify.php"> <span class="d-none d-md-inline">Verification</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark" href="auction.php"> <span class="d-none d-md-inline">Auction</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark active" href="farmers.php"> <span class="d-none d-md-inline">Farmers</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark" href="retailers.php"> <span class="d-none d-md-inline">Retailers</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="col bg-faded py-3 flex-grow-1">
            <h1 class="text-dark" id="space" style="margin-left:20px;">Verification</h2>
            <div class="row">
                        <div class="col-2"></div>
                            <div class="col-8">
                                <div class="tab-container" style="margin-top:40px">
                                        <input id="tab1" type="radio" name="tabs" checked>
                                        <label for="tab1">Farmers</label>

                                        <input id="tab2" type="radio" name="tabs">
                                        <label for="tab2">Retailers</label>

                                        <section id="content1">
                                        <?php
$sql1="SELECT * from farmer where isVerified=0";
$s1=mysqli_query($con,$sql1);
while(($row=mysqli_fetch_array($s1))==TRUE)
{?>
                                            <div class="active-auct">
                                                <ul class="auct-items">
                                                    <li> ID: <span style="font-weight:600;"><?php echo $row[0];?></span></li>
                                                    <li>Name: <span style="font-weight:600;"><?php echo $row[1];?></span></li>
                                                </ul>
                                                <div class="bid-items">
                                                    <li>Phone no: <?php echo $row[2];?></li>
                                                    <li>Address: <?php echo $row[4];?></li>
                                                </div>
                                                <div class="btn cancel-btn"><a href="verify_farmer_action.php?id1=<?php echo $row[0];?>"style="color:#75E78E;font-weight:600;">Verify</a></div>
                                                <div class="btn cancel-btn"><a href="decline_farmer_action.php?id1=<?php echo $row[0];?>"style="color:#CC5F5F;font-weight:600;">Decline</a></div>
                                            </div>
<?php
}
?>
                                        </section>

                                        <section id="content2">
                                        <?php                                                
$sql1="SELECT * from retailer where isVerified=0";
$s1=mysqli_query($con,$sql1);
while(($row=mysqli_fetch_array($s1))==TRUE)
{?>
                                        <div class="active-auct">
                                                <ul class="auct-items">
                                                    <li> ID: <span style="font-weight:600;"><?php echo $row[0];?></span></li>
                                                    <li>Name: <span style="font-weight:600;"><?php echo $row[1];?></span></li>
                                                </ul>
                                                <div class="bid-items">
                                                    <li>Phone no: <?php echo $row[2];?></li>
                                                    <li>Address: <?php echo $row[4];?></li>
                                                </div>
                                                <div class="btn cancel-btn"><a href="verify_retailer_action.php?id1=<?php echo $row[0];?>"style="color:#75E78E;font-weight:600;">Verify</a></div>
                                                <div class="btn cancel-btn"><a href="decline_retailer_action.php?id1=<?php echo $row[0];?>"style="color:#CC5F5F;font-weight:600;">Decline</a></div>
                                            </div>
<?php
}
?>
                                        </section>

                                </div>
                        </div>
                        <div class="col-2"></div>
        </main>
    </div>
</div>    
</body>





