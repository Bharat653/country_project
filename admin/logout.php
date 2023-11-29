<?php
session_start();

if(isset($_SESSION["authuser"])){
    unset($_SESSION['authuser']);
  
}
header("location:../index.php");
?>
