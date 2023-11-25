<?php
include '../database/connection.php';
session_start();
$result = "";
$countries = "";
if (isset($_REQUEST['submit'])) {
  if (($_REQUEST['country_name'] == "") || ($_REQUEST['country_code'] == "")) {
    echo "All fields are required";
  } else {
    $result = $database->addcountry();
    if ($result) {
      echo "Country added successfully";
    } else {
      echo "Failed to add country";
    }
  }
}
// print_r($_POST);
// exit();
$countries = $database->getCountries();
// print_r($countries);
// exit();
?>
<!-- Warning: Undefined array key "country-name" in C:\xampp\htdocs\country_project\admin\country.php on line 4 -->




<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">

  <title>
    Dashboard C Project
  </title>
  <?php
  require_once "link/head.php"

  ?>
</head>


<body class="g-sidenav-show  bg-gray-100">

  <!-- Button trigger modal -->

  <?php
  require_once "link/side-header.php"

  ?>
  <main class="main-content border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">

          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Country</li>
          </ol>


        </nav>
      </div>
    </nav>

    <!-- End Navbar -->

    <h1>Country</h1>
    <div class="container-fluid py-4">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Country
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add country</h5>

            </div>
            <div class="modal-body">
              <form action="country.php"  method="post">
        
                <div class="modal-body ">
                  <div class="form-group">
                    <label class="control-label"><b>Enter Country Name:</b></label>
                    <input type="text" class="form-control input-sm " name="country_code" value="" placeholder="Enter Country">
                  </div>

                  <div class="form-group">
                    <label class="control-label"><b>Enter Country Code:</b></label>
                    <input type="text" class="form-control input-sm " name="country_name" value="" placeholder="Enter Code">
                  </div>
                </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-sm btn-primary">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div>
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Country name</th>
              <th scope="col">Country code</th>
            </tr>
          </thead>
          <?php
          // Loop through the $countries array and display each row
          foreach ($countries as $country) {
            echo "<tr>";
            echo "<td>" . $country['id'] . "</td>";
            echo "<td>" . $country['country_name'] . "</td>";
            echo "<td>" . $country['country_code'] . "</td>";
            echo "</tr>";
          }
          ?>
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