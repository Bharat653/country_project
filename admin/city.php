<?php
include  '../database/connection.php';
session_start();
$result = "";
// $citys = "";
$citys = $database->getcitys();
$countries = $database->getCountries();
$states = $database->getstates();
if (isset($_REQUEST['submit'])) {
  if (($_REQUEST['city_name'] == "") || ($_REQUEST['city_currency'] == "")) {
    echo ("all field are required");
  } else {
    $result = $database->addcity();
    if ($result) {
      echo ("city added");
      $countries = $database->getCountries();
      $states = $database->getstates();
      
    } else {
      echo ("city not added");
    }
  }
}
?>
<!DOCTYPE html>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">City</li>
          </ol>


        </nav>
      </div>
    </nav>

    <!-- End Navbar -->

    <h1>City </h1>
    <div class="container-fluid py-4">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add city
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="city.php" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add city </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body ">
                <div class="form-group">
                  <label class="control-label">Country</label>
                  <select name="country_id" id="country_id" class="form-control input-sm">
                    <option>Selecet Country</option>
                    <?php foreach ($countries as $country) : ?>
                      <option value="<?php echo $country['id']; ?>"><?php echo $country['country_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">State</label>
                  <select name="state_id" id="state_id" class="form-control input-sm">
                    <option>Selecet State</option>
                    <?php foreach ($states as $state) : ?>
                      <option value="<?php echo $state['id']; ?>"><?php echo $state['state_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Enter city name:</label>
                  <input type="text" class="form-control input-sm " name="city_name" value="" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label class="control-label">Enter city currency:</label>
                  <input type="text" class="form-control input-sm " name="city_currency" value="" placeholder="Enter currency">
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-sm btn-primary">
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
            <th scope="col">city Name</th>
            <th scope="col">city currency</th>
          </tr>
        </thead>
        <?php
        // Loop through the $countries array and display each row
        foreach ($citys as $city) {
          echo "<tr>";
          echo "<td>" . $city['city_name'] . "</td>";
          echo "<td>" . $city['city_currency'] . "</td>";
          echo "</tr>";
        }
        ?>
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