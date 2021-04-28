<?php
session_start();
include_once("dbConfig.php");
echo".";
if(isset($_POST['Submit'])) 
{
    $rid=$_SESSION['rid'];
    $crop =$_POST['crop'];
    $price =$_POST['price'];
    $date = date('Y-m-d');
    $quantity =$_POST['quantity']; 
    $description =$_POST['description'];
    $insertquery="INSERT INTO retailerdemand (`rid`, `crop`, `bazeprize`,`status`, `date`, `quantity`, `description`) VALUES (1,'$crop',$price,0,'$date',$quantity,'$description')";
    $result=(mysqli_query($con,$insertquery));
    echo "<script>alert('success..');</script>";
    header("location:CurrentDemands.php?flg=0");    
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Saurav">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="assets\css\demandStyles.css">
<title>Demands</title>
</head>

<body class="bg-light">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-6 bg-imgo">
                
                
            </div>
            <div class="col-md-6 ">
                <div class="row mb-5 justify-content-md-center">

                        
                            <div  class=" col-md-9 mb-5  align-self-center ">

                                <div class="py-5 text-center">
                                    <h2>What you need?</h2>
                                </div>
                                <form method="post" name="form1"> 
                                    

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Crop </label>
                                            <select class="custom-select d-block w-100" name="crop" aria-label="Default select example">
                                                <option selected>Select crop</option>
                                                <option value="Wheat">Wheat</option>
                                                <option value="Rice">Rice</option>
                                                <option value="Coconut">Coconut</option>
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="number" class="form-control" name="price" id="firstName" placeholder="Enter price" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">quantity</label>
                                        <input type="number" class="form-control" name="quantity" id="firstName" placeholder="Enter qty" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Decription</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="Enter description if any..." rows="3"></textarea>
                                    </div>

                        
                                    <hr class="mb-4 w-100">
                                    <button type="submit" name="Submit" class="btn btn-primary w-100 btn-lg btn-block">Submit</button>
                                </form>
                            </div>
                </div>
                    
            </div>
        </div>
        
    </div>


    <!-- <footer class=" mt-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">&copy; 2020-2021 Farmers Day Trade</p>
                    
                </footer> -->
              

        
            

                
                
    
</body>
</html>