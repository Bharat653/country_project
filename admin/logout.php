<?php
session_start();

// if(isset($_SESSION["data"])){
//     unset($_SESSION['login-data']);
//     unset($_SESSION['data-key']);
//     // unset($_SESSION['login-data']);
//     $_SESSION["message"] = 'your acc deleted';
// }
header("location:../index.php");
?>
