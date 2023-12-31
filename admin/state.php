<?php
include '../database/connection.php';
session_start();
if(!isset($_SESSION['authuser'])){
  header('Location:../index.php');
}
$result = "";
$state = "";
$country_id = "";
// $states = "";

if (isset($_POST['updateEdit1'])) {
  // Get the form data
  
  $state_id = $_POST['state_id'];
  $state_name = $_POST['state_name'];
  $state_code = $_POST['state_code'];
  $country_name = $_POST['country_name'];
 

  echo($state_id);
  echo($state_name);
  echo($state_code);
  echo($country_name);

  // Update the country information in the database\
  $database = new Database;
  $result = $database->updateEdit(['state_id' => $state_id, 'state_name' => $state_name, 'state_code' => $state_code, 'country_name' =>$country_name]);
  if ($result) {
      echo "state updated successfully";
  } else {
      echo "Failed to update country";
  }
}


if (isset($_REQUEST['submit'])) {
  if (($_REQUEST['state_name'] == "") || ($_REQUEST['state_code'] == "")) {
    echo "All fields are required";
  } else {
    $result = $database->addstate();
    if ($result) {
      echo "state added successfully";

      $countries = $database->getCountries();
    } else {
      echo "Failed to add state";
    }
  }
}
$countries = $database->getCountries();
$states = $database->getstates();


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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">state</li>
          </ol>


        </nav>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add state </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="state.php" method="post">
                <div class="modal-body ">
                  <div class="form-group">
                    <label class="control-label">Country</label>
                    <select name="country_id" id="country_id" class="form-control input-sm">
                      <option>Select Country</option>
                      <?php foreach ($countries as $country) : ?>
                        <option value="<?php echo $country['id']; ?>"><?php echo $country['country_name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Enter state name:</label>
                    <input type="text" class="form-control input-sm " name="state_name" value="" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Enter state code:</label>
                    <input type="text" class="form-control input-sm " name="state_code" value="" placeholder="Enter state">
                  </div>
                </div>

                <div class="modal-footer">
                  <input type="submit" name="submit" class="btn btn-sm btn-primary">
                </div>
              </form>

            </div>
            <div></div>
          </div>
        </div>
      </div>

    </nav>


    <!-- End Navbar -->


    <h1>State </h1>
    <div class="container-fluid py-4">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add state
      </button>

      <!-- Modal -->

      <div>
        <table class="table table-dark">
          <thead>
            <tr>
              <!-- <th scope="col">state No</th>           -->
              <th scope="col">S/no</th>
              <th scope="col">state Name</th>
              <th scope="col">state Code</th>
              <th scope="col">Country name</th>
              <th scope="col">Delete</th>
              <th scope="col">Edit</th>

              <!-- <th scope="col">Country Name</th> -->
              <!-- <th scope="col">state currency</th> -->
            </tr>
          </thead>
          <?php
          $serialnumber = 1;
          // Loop through the $countries array and display each row

          // print_r($states);x
          // die($states);
          foreach ($states as $state) {
            echo "<tr>";
            echo "<td>" . $serialnumber . "</td>";
            echo "<td>" . $state['state_name'] . "</td>";
            echo "<td>" . $state['state_code'] . "</td>";

           
            // Fetch the corresponding country name using the country ID
            $country_id = $state['country_id'];
            $country_name = $database->getCountryNameById($country_id); // Replace this with the actual function name you use
            echo "<td>" . $country_name . "</td>";
            echo "<td><button class='btn btn-danger'><a href='delete2.php?deleteid=" . $state['id'] . "'>delete</a></button></td>";
            echo "<td><button class='btn btn-warning'><a href='edit2.php?editid=". $state['id']."'>edit</a></button></td>";
            echo "</tr>";
            $serialnumber++;
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