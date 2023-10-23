<?php session_start(); ?>
<?php require_once "./actions/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empowering Women Crafts</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <h1><i class="fas fa-spinner fa-spin text-primary"></i></h1>
            <h4>Loading</h4>
        </div>
        <div>
            <div class="row flex-column">
                <nav class="navbar navbar-expand-lg navbar-light w-100 bg-info fixed-top">
                    <div class="container">
                        <a class="navbar-brand text-white" href="./"><h4> <b>EMCRAFTS Website</b></h4></a>
                        <!-- Add navigation links here -->
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="shop.php">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="login.php">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="contact.php">Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Product Cards -->
            <div class="d-flex justify-content-between align-items-center" style="height:70vh;background-image: url('images/bg.jpg'); background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">

                <div class="px-4">

                    <div>
                        <h1 class="text-white">Empowering Women Crafts</h1>
                        <h4 class="description text-white">Discover unique handcrafted items made with passion and
                            creativity.</h4>
                    </div>
                    <h4 class="text-white">
                        Empowering Women Artisans through E-Commerce, project is rooted in <br>the recognition of the
                        unique
                        challenges faced by women artisans in the realm <br> of traditional craftsmanship.
                    </h4>
                    <a href="./shop.php" class="btn btn-primary btn-lg">Explore Our Crafts</a>

                </div>
            </div>

            <div class="container mt-5">

                <div class="row">
                    <?php
                    $sql = "SELECT * FROM `products` LIMIT 8";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col-lg-3 col-md-5 mb-4">
                            <div class="">
                                <img src="./images/<?php echo $row["images"]; ?>" class="card-img-top" alt="Product Image">
                                <h5 class="card-title">
                                    <?php print($row["name"]); ?>
                                </h5>

                                <p class="card-text">
                                    <?php echo $row["decription"]; ?> rwf
                                </p>
                                <p class="card-text">
                                    <?php echo $row["price"]; ?> rwf
                                </p>
                                <a href="buy.php?q=<?php echo $row["id"]; ?>" class="btn btn-primary">Buy Product</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Add more product cards here -->
                </div>
            </div>
        </div>
        <!-- Main Footer -->
        <?php include "uifooter.php"; ?>

    </div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>