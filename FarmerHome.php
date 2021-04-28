<?php
include ("dbconfig.php");
session_start();
$fid=$_SESSION['fid'];
$sql="select * from farmer where fid=$fid";
$farmer=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($farmer);

if(isset($_POST['accept'])){
    $auid=$_POST['auid'];
    echo $auid;
    $query="UPDATE auction SET status=1 WHERE auid = $auid";
    $result=mysqli_query($con,$query);
     header("Location: FarmerHome.php");
}
elseif(isset($_POST['cancel'])){
    $auid=$_POST['auid'];
    $query="DELETE from auction  where auid = $auid";
    $result=mysqli_query($con,$query);
     header("Location: FarmerHome.php");
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer</title>
    <link rel="stylesheet" href="./assets/farmer.css">
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
                <li><a href="DemandTab.php?flg=0">Demands</a></li>
            </ul>
            <div class="logout-btn">
                <a href="./logout.php">Logout</a>
            </div>
        </nav>
        <div class="navig-border"></div>
    </div>
    <div class="profile-container">
        <ul class="profile-items">
        
            <li id="profile-name"><span style="color: #665F5F;">Hello</span>  <?php echo $data['fname']?></li><br>
            <li><span id="profile-info">Status:</span> Online</li>
            <li><span id="profile-info">Total Auctions:</span> 27</li>
            <li><span id="profile-info">Total Earnings:</span> ₹ 27,000</li>
        </ul>
        <img src="./assets/FarmerAvatar.png" class="farmer-avatar">
    </div>

    <div class="tab-container">
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1">Active Auction</label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2">Completed Auctions</label>

        <section id="content1">
            <?php
            $sql2="SELECT * FROM auction WHERE status=0 AND fid=$fid ORDER BY auid DESC";
            $records=mysqli_query($con,$sql2);
            while($data = mysqli_fetch_array($records))
            {
               $retailerId=$data['rid'];
               $selectSql="SELECT rname FROM retailer WHERE rid=$retailerId";
               $selectResult=mysqli_query($con,$selectSql);
               $selectData=mysqli_fetch_assoc($selectResult);
              $rname=$selectData['rname'];            
            ?>

        <div class="active-auct">
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
            <form method="post">
            <input type="hidden" name="auid" value="<?php echo $data['auid']?>">
            <button class="accept-btn" type="submit"  name="accept">Wind up</button>
            <button class="cancel-btn"  type="submit" name="cancel"> Cancel</button>
            </form>
         </div>
        <?php
            }
            ?>
        </section>

        <section id="content2">
            <?php
            $sql2="SELECT * FROM auction WHERE status=1 AND fid=$fid ORDER BY auid DESC";
            $records=mysqli_query($con,$sql2);
            while($data = mysqli_fetch_array($records))
            {
               $retailerId=$data['rid'];
               $selectSql="SELECT rname,phone FROM retailer WHERE rid=$retailerId";
               $selectResult=mysqli_query($con,$selectSql);
               $selectData=mysqli_fetch_assoc($selectResult);
              $rname=$selectData['rname'];
			  $phone=$selectData['phone'];			  
            ?>

        <div class="active-auct">
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
				echo "<li>Phone: <span style='font-weight: 600;'>$phone</span></li>";
                ?>
            </div>
              <button class="accept-btn" type="submit" >Completed</button>
         </div>
        <?php
            }
            ?>


        </section>

    </div>

</body>

</html>