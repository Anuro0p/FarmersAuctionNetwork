<?php
session_start();
if(isset($_SESSION['phone']))
{
}
else{
    header("Location: ../login.php");
}
?>