<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Project</span>
        </a>
    </div>


    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">



        <li class="nav-item">
            <a class="nav-link text-white " href="country.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
            </div>

            <span class="nav-link-text ms-1">Country</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white " href="state.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
            </div>

            <span class="nav-link-text ms-1">State</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white " href="city.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
            </div>

            <span class="nav-link-text ms-1">City</span>
            </a>
        </li>
        </ul>
        <!-- <button type="button" class="btn btn-info"><a href="logout.php">Log out</a></button> -->
    </div>
    <footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <!-- Other footer content -->
            </div>
            <div class="col-6 text-end">
                <!-- echo ("userLogin($_POST)"); -->
                <button type="button" class="btn btn-dark"><a href="logout.php" class="text-white">Log out</a></button>
            </div>
        </div>
    </div>
</footer>

</aside>
