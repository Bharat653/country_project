<?php
require_once "../database/connection.php";
session_start();
if(!isset($_SESSION['authuser'])){
  header('Location:../index.php');
}
$obj = new Database();
// $obj->loggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
    }
</style>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">

  <title>
    Dashboard Project

  </title>
  <?php
  require_once "link/head.php"

  ?>
</head>


<body class="g-sidenav-show  bg-gray-100">

  <!-- Button trigger modal -->
  <?php
  require_once "link/side-header.php";
  ?>

  <main class="main-content border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">

          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
          </ol>
          
     


        </nav>
      </div>
    </nav>

    <!-- End Navbar -->

    <h1>Welcome!</h1>        
    <div class="container-fluid py-4">
      <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Country
      </button> -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- <form>
                <label>Enter the Country Name</label>
                <input type="text" name="country_name">
                <label>Enter the Country Code</label>
                <input type="text" name="country_code">
                <label>Enter the Country Currency</label>
                <input type="text" name="country_currency">
              </form> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <div>
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"> Name</th>
              <th scope="col"> Code</th>
              <th scope="col"> currency</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>

    </div>


  </main>

  <!--   Core JS Files   -->
  <?php
  require_once "link/lower-js.php";
  ?>

</body>

</html>