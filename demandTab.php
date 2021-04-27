<?php
    include_once("dbConfig.php");
    session_start();
    // $_SESSION['fid']=1;
    $flg=0;
    $flg=$_GET['flg'];
    if($flg==1||$flg==2){
        echo "<script> alert('success') </script>";
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auctions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/auctionstyle.css">
</head>

<body>

<input type="button" class="btn" name="inspecionar"  onClick="location.href=’/wisegest/index_insp.php?cod_meio= ???’">
    <!--Navbar-->
    <div class="navigation">
        <nav class="navig-bar">
            <div class="logo">
                Farmer Network
            </div>
            <ul class="navig-items">
                <li><a href="./FarmerHome.html">Home</a></li>
                <li><a href="#">Auctions</a></li>
                <li><a href="#">Demands</a></li>
            </ul>
            <div class="logout-btn">
                <a href="#">Logout</a>
            </div>
        </nav>
        <div class="navig-border"></div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary button-pos" data-toggle="modal" data-target="#auctionModalCenter">
    New Auction
  </button>
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
                    <form action="#">

                        <div class="form-group">
                            <label for="cropSelect">Select the Crop</label>
                            <select class="form-control" id="cropSelect">
                                  <option>Wheat</option>
                                  <option>Rice</option>
                                  <option>Coconot</option>
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
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="Enter description if any..." rows="3"></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="consentCheck" required>
                            <label class="form-check-label" for="consentCheck">Above details are correct and initiate auction</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Start</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <!--Auction Container-->
    <div class="auction-container">
        <h2>Current Sales</h2>

        <?php

        include "dbConfig.php"; // Using database connection file here

        $records = mysqli_query($con,"SELECT * FROM retailerdemand where status=0;"); // fetch data from database
        $fid = $_SESSION['fid'];

        while($data = mysqli_fetch_array($records))
        {
        ?>

        <div class="auction-main">
            <?php 

                if($data['crop']=="wheat"){
                echo"<img src='./assets/wheat.png' class='auct-img'>"; 
                }
                else if($data['crop']=="Coconut"||$data['crop']=="coconut"){
                echo"<img src='./assets/coconut.png' class='auct-img'>";
                }
                else if($data['crop']=="rice"||$data['crop']=="Rice"){
                echo"<img src='./assets/rice.png' class='auct-img'>";
                }else
                {
                echo"<img src='./assets/150-1507350_transparent-vegetables-in-the-basket-png-png-download.png' class='auct-img'>";}
            ?>
            <ul class="auct-items">
                <li> Crop: <span style="font-weight: 600;"><?php echo $data['crop'] ?></span></li>
                <li> <span style="font-size: small;">Description: <?php echo $data['description'] ?></span></li>
            </ul>
            <div class="bid-items">
                <li>Price <span style="color: #94ee92;font-weight: 600;">₹<?php echo $data['bazeprize'] ?></span></li>
            </div>

            <!-- Button trigger modal -->
            <form >
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $data['did'] ?>">Counter</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenters<?php echo $data['did'] ?>">ogei</button>
            </form>
            


            <!-- model2 -->

                        <?php 
                            $did=$data['did'];
                        ?> 



            
            <div class="modal fade" id="exampleModalCenters<?php echo $data['did'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Sell Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="tradeConfirm.php">
                                
                                <input type="hidden" id="custId" name="did" value="<?php echo $data['did'] ?>">
                                <input type="hidden" id="custId" name="offerprice" value="<?php echo $data['bazeprize'] ?>">
                                    <p style="color:black;">Do you wnat to confirm ?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancell</button>
                                    <button type="submit" class="btn btn-primary" >Confirm</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter<?php echo $data['did'] ?>"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Counter Offer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="sellconfirm.php">
                                <div class="form-group">
                                    <label for="offerprice" style="color: black;">Offer Price</label>
                                    <input type="number" class="form-control" name="offerprice" placeholder="Amount" required>
                                </div>

                                <input type="hidden" id="custId" name="did" value="<?php echo $data['did'] ?>">

                                <?php
                                    echo $data['crop'];
                                    echo $did;
                                ?>



                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Comments</label>
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" placeholder="Enter any comments..." rows="3"></textarea>
                                </div>
                                    

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" >Place</button>
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