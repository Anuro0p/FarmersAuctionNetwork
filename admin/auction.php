<?php
include ("dbconfig.php");
session_start();
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
#top{
  margin-top:100px;
}
</style>

</head>
<body>
<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
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
                            <a class="nav-link pl-0  font-weight-bold text-dark" href="admin_index.php"><span class="d-none d-md-inline">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark" href="verify.php"> <span class="d-none d-md-inline">Verification</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark" href="auction.php"><span class="d-none d-md-inline">Auction</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark" href="farmers.php"> <span class="d-none d-md-inline">Farmers</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 font-weight-bold text-dark" href="retailers.php"><span class="d-none d-md-inline">Retailers</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="col bg-faded py-3 flex-grow-1">
        <h1 class="text-dark" id="space" style="margin-left:20px; margin-top:100px;">Auction</h2>
                <div class="row">
                    <div class="col-2"></div>
                        <div class="col-8">
                            <form action="auction_action.php" method="POST" id="top">
                                <div class="form-group">
                                    <label>Choose Date</label>
                                    <input type="date" class="form-control" value="<?php echo $today; ?>" name="date">
                                </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-light btn-white">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="col-2"></div>
            </div>


            
        </main>
    </div>
</div>    
</body>





