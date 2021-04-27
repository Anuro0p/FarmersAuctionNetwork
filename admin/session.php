<?php
session_start();
if(isset($_SESSION['username']))
{
}
else{
    header("Location: ../admin_login.php");
}
?>