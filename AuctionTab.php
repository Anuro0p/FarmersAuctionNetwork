<?php
include ("dbconfig.php");
session_start();
$succFlag=0;
if(isset($_POST['start'])){
    $cropSelect=$_POST['cropSelect'];
    $quantityCrop=$_POST['quantityCrop'];
    $basePrize=$_POST['basePrize'];
    $description=$_POST['description'];
    $fid=$_SESSION['fid'];
    $date = date('Y-m-d');
    $currprize=$basePrize;

    $sql="INSERT INTO auction (crop,quantity,baseprize,currprize,description,fid,date,status) VALUES ('$cropSelect',$quantityCrop,$basePrize,$currprize,'$description',$fid,'$date',0)";
    $push=(mysqli_query($con,$sql));
    if($push){
        $succFlag=1;
    }
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auctions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/auctionstyle.css">
</head>

<body>
    <!--Navbar-->
    <div class="navigation">
        <nav class="navig-bar">
            <div class="logo">
                Farmer Network
            </div>
            <ul class="navig-items">
                <?php 
                if($_SESSION['user']=='farmer'){
                echo "<li><a href='./FarmerHome.php'>Home</a></li>";
                }
                else echo "<li><a href='./RetailerHome.php'>Home</a></li>";
                ?>
                <li><a href="#">Auctions</a></li>
                <li><a href="#">Demands</a></li>
            </ul>

<?php
if($_SESSION['user']=='retailer'){
          echo "<div class='logout-btn-ret'>";
}
else{
          echo "<div class='logout-btn'>";
}
?>
                <a href="./logout.php">Logout</a>
            </div>
        </nav>
        <div class="navig-border"></div>
        <?php
        if($succFlag){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" > <spans styel="text-align:center;">Auction Successfully Placed!</span> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <?php
        }
        ?>
    </div>

    <?php
    if($_SESSION['user']=='farmer')
    {
    ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary button-pos" data-toggle="modal" data-target="#auctionModalCenter">
    New Auction
    </button>

    <?php
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="auctionModalCenter" tabindex="-1" role="dialog" aria-labelledby="auctionModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="auctionModelTitle" style="font-weight: 600;">New Auction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="cropSelect">Select the Crop</label>
                            <select class="form-control" name="cropSelect" id="cropSelect">
                                  <option>Wheat</option>
                                  <option>Rice</option>
                                  <option>Coconut</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="quantityCrop">Enter the quantity in Kg(s)</label>
                            <input type="number" class="form-control" name="quantityCrop" placeholder="Enter quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="basePrize">Enter the base price for the auction</label>
                            <input type="number" class="form-control" name="basePrize" placeholder="Amount" required>
                        </div>
                        <div class="form-group">
                            <label for="">Decription</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter description if any..." rows="3"></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="consentCheck" required>
                            <label class="form-check-label" for="consentCheck">Above details are correct and initiate auction</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="start" >Start</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!--Auction Container-->
    <div class="auction-container">
        <h2>Current Auctions</h2>
        <?php

        $sql2="SELECT * FROM auction WHERE status=0 ORDER BY auid DESC";
        $records=mysqli_query($con,$sql2);


        if (isset($_POST['place'])) {
        $currPrize=$_POST['bidPrize'];
        $currId=$_POST['currId'];
        $retId=$_POST['retId'];

        $upsql="UPDATE auction SET currprize=$currPrize,rid=$retId WHERE auid=$currId";
        $updateq=mysqli_query($con,$upsql);
        header("Location:AuctionTab.php");

        }


        while($data = mysqli_fetch_array($records))
        {
            $auctfid=$data['fid'];

            $farmersql="SELECT fname from farmer where fid=$auctfid";
            $result=mysqli_query($con,$farmersql);
            $record2=mysqli_fetch_assoc($result);
            $fname=$record2['fname'];

           $retailerId=$data['rid'];
           $selectSql="SELECT rname FROM retailer WHERE rid=$retailerId";
           $selectResult=mysqli_query($con,$selectSql);
           $selectData=mysqli_fetch_assoc($selectResult);
          $rname=$selectData['rname'];
         ?>


        <!-- Auction Cards -->
        <div class="auction-main">
            <?php 

                if($data['crop']=="Wheat"){
                echo"<img src='./assets/wheat.png' class='auct-img'>"; 
                }
                else if($data['crop']=="Coconut"){
                echo"<img src='./assets/coconut.png' class='auct-img'>";
                }
                else{
                echo"<img src='./assets/rice.png' class='auct-img'>";
                }
            ?>
            <ul class="auct-items">
                <li> Crop: <span style="font-weight: 600;"><?php echo $data['crop'] . " ( " . $data['quantity'] . "kg )"?></span></li>
                <li> Base Prize:  <span style="font-weight: 600;">₹ <?php echo $data['baseprize']?></li>  
                <li>Auction By: <span style="font-weight: 600;"><?php echo $fname ?></span></li>
                <li> <span style="font-size: small;"><?php echo "Description: " . $data['description']?></span></li>
            </ul>
            <div class="bid-items">
                <li>Highest Bid: <span style="color: #94ee92;font-weight: 600;">₹ <?php echo $data['currprize'] ?></span></li>
                <?php 
                if($data['rid']==0){
                echo "<li>By: <span style='font-weight: 600;'>No Bids</span></li>";
                }
                else
                {

                echo "<li>By: <span style='font-weight: 600;'>$rname</span></li>";
                }
                
                ?>
            </div>

    <?php
    if($_SESSION['user']=='retailer')
    {
    ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" style="padding:.5em 2em;" data-toggle="modal" data-target="#exampleModalCenter<?php echo $data['auid'] ?>">Bid</button>

    <?php
    }
    ?>



            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter<?php echo $data['auid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Bid Your Amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                        </div>

                        <div class="modal-body">
                        <ul>
                            <li style="font-weight: 600; color: black;"> Crop: <span><?php echo $data['crop'] . " ( " . $data['quantity'] . "kg )"?></span></li>
                            <li style="font-weight: 600; color: black;"> Base Prize:  <span>₹ <?php echo $data['baseprize']?></li>  
                            <li style="font-weight: 600; color: black;">Auction By: <span><?php echo $fname ?></span></li>
                            <li style="font-size: small; color: black;"> <span><?php echo "Description: " . $data['description']?></span></li>
                        </ul>

                            <form method="post">
                                <div class="form-group">
                                    <label for="bidPrize" style="color: black;">Enter your bid amount for the crop</label>
                                    <input type="number" class="form-control" name="bidPrize" placeholder="Amount" required min=<?php echo $data['currprize']?>>
                                    <input type="hidden" name="currId" value="<?php echo $data['auid'] ?>">
                                    <input type="hidden" name="retId" value="<?php echo $_SESSION['rid'] ?>">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="place">Place</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    <?php
    }
    ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>