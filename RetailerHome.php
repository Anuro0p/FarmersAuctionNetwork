
<?php
include ("dbconfig.php");
session_start();
$rid=$_SESSION['rid'];
$sql="select * from retailer where rid=$rid";
$retailer=mysqli_query($con,$sql);
$data1=mysqli_fetch_assoc($retailer);
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer</title>
    <link rel="stylesheet" href="./assets/retailer.css">
</head>

<body>
    <div class="navigation">
        <nav class="navig-bar">
            <div class="logo">
                Farmer Network
            </div>
            <ul class="navig-items">
                <li><a href="#">Home</a></li>
                <li><a href="./AuctionTab.php">Auctions</a></li>
                <li><a href="#">Demands</a></li>
            </ul>
            <div class="logout-btn">
                <a href="./logout.php">Logout</a>
            </div>
        </nav>
        <div class="navig-border"></div>
    </div>
    <div class="profile-container">
        <ul class="profile-items">
        
            <li id="profile-name"><span style="color: #665F5F;">Hello </span><?php echo $data1['rname'] ?></li><br>
            <li><span id="profile-info">Status:</span> Online</li>
            <li><span id="profile-info">Total Auctions:</span> 27</li>
            <li><span id="profile-info">Total Earnings:</span> ₹ 27,000</li>
        </ul>
        <img src="./assets/RetailerAvatar.png" class="farmer-avatar">
    </div>

    <div class="tab-container">
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1">Active Auction</label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2">Completed Auctions</label>

        <section id="content1">
            <div class="active-auct">
                <img src="./assets/wheat.png" class="auct-img">
                <ul class="auct-items">
                    <li> Crop: <span style="font-weight: 600;">Wheat (10kg)</span></li>
                    <li>Time Remaining: <span style="font-weight: 600;">01:00:00</span></li>
                </ul>
                <div class="bid-items">
                    <li>Highest Bid: ₹ 15,000</li>
                    <li>By: Athul Dinesan</li>
                </div>
                <div class="cancel-btn"><a href="#">Cancel</a></div>
            </div>
        </section>

        <section id="content2">

        </section>

    </div>

</body>

</html>