<?php
session_start();
if(isset($_SESSION['phone']))
{
    unset($_SESSION['phone']);
    session_destroy();
    header("Location: ../login.php");
}
?>