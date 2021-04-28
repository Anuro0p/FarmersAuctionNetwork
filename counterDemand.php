<?php
    include_once("dbConfig.php");
    session_start();
    $rid=$_SESSION['rid'];
    $flg=0;
    $flg=$_GET['flg'];
    // if($flg==1||$flg==2){
    //     echo "<script> alert('success') </script>";
    // }

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

    <!--Navbar-->
    <div class="navigation">
        <nav class="navig-bar">
            <div class="logo">
                Farmer Network
            </div>
            <ul class="navig-items">
                <li><a href="./FarmerHome.html">Home</a></li>
                <li><a href="AuctionTab.php">Auctions</a></li>
                <li><a href="#">Demands</a></li>
                <li><a href="CurrentDemands.php?flg=0">Listed</a></li>
            </ul>
            <div class="logout-btn">
                <a href="./logout.php">Logout</a>
            </div>
        </nav>
        <div class="navig-border"></div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
  


    <!--Demand Container-->
    <div class="auction-container">
        <h2>Counter Offers</h2>
        <a href="acceptedDemands.php?flg=0"><input class="btn btn-secondary" type="button" value="Confirmed orders"></a>

        <?php

        include "dbConfig.php"; // Using database connection file here

        $records = mysqli_query($con,"SELECT * FROM retailerdemand where status=1 AND rid=$rid;"); // fetch data from database

        if(mysqli_num_rows($records)==0){
            echo "<h1 style='margin-top :200px;'>Looks like you dont have any offers going on..</h1>";
        }

        while($data = mysqli_fetch_array($records))
        {
        ?>

        <div style="border:0px solid black; border-radius: 0px; box-shadow: 5px 10px 30px #888888; background-color:white; color:black" class="auction-main">
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
            <ul class="auct-items-mine">
                <li> Crop: <span style="font-weight: 600;"><?php echo $data['crop'] ?></span></li>
                <li> <span style="font-size: small;">Description: <?php echo $data['description'] ?></span></li>
            </ul>

            <ul  class="auct-items-mine">
                <li> Offer: ₹  <span style="font-weight: 600;"><?php echo $data['offerprize'] ?></span></li>
                <li> <span style="font-size: small;">message: <?php echo $data['message'] ?></span></li>
            </ul>
            <div class="bid-items">
                <li>Price :  <span style="color: #green;font-weight: 600;">₹<?php echo $data['bazeprize'] ?></span></li>
            </div>

            

            <!-- Button trigger modal -->
            <form >
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $data['did'] ?>">Accept</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenters<?php echo $data['did'] ?>">Reject</button>
            </form>
            


            <!-- model2 -->

                        <?php 
                            $did=$data['did'];
                        ?> 



            
            <div class="modal fade" id="exampleModalCenters<?php echo $data['did'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Reject Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="rejectConfirm.php">
                                
                                <input type="hidden" id="custId" name="did" value="<?php echo $data['did'] ?>">
                                    <p style="color:black;">Do you wnat to confirm reject?</p>
                                <div class="modal-footer">
                                    
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
                            <form action="acceptConfirm.php">
                                

                                <input type="hidden" id="custId" name="did" value="<?php echo $data['did'] ?>">
                                <p style="color:black;">Do you wnat to Accept  offer?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancell</button>
                                    <button type="submit" class="btn btn-primary" >Confirm</button>
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