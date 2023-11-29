<?php
session_start();
require 'database/connection.php';



$object = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isLogged = $object->userLogin($_POST);
    if ($isLogged) {
        $_SESSION["authuser"]=$isLogged;
          header('Location:admin/index.php');   
        // echo ("login successfully");
        // include("../dashboard/index.html");
        // echo '<script>';
        // echo 'alert("Login successful!");';
        // echo '</script>';
    } else {
        echo ("invaild creditnal");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body background="">
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div> -->
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="index.php" method="post">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Login Form</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                            <label class="form-label">Enter Your Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                            <label class="form-label">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                        <input type="submit" id="done" value="Log in" class="btn btn-dark btn-sm" name="submit">
                                        </div>
                                        <div id="loginAlert" class="alert alert-success" style="display: none;">
                                        Login successful!
                                    </div>

                                        <!-- <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                      style="color: #393f81;">Register here</a></p> -->
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // JavaScript to show the alert after a successful login
        <?php
        if ($isLogged) {
            echo 'document.getElementById("loginAlert").style.display = "block";';
        }
        ?>
    </script>
    <!-- <form action="index.php" method="post">
        <div class="container-fluid">
            <div class="row my-3">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" id="formid">
                        <div class="card">
                            <div class="card-header">
                                <h4>Login form</h4>
                            </div>
                            <div class="card-body py-3" id="form">
                                <div class="form-group">
                                    <label>Enter name</label>
                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Enter the password</label>
                                    <input type="password" id="password" name="password" placeholder="password" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" id="done" value="Log in" class="btn btn-dark btn-sm" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form> -->
</body>

</html>