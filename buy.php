<?php session_start(); ?>
<?php require_once "./actions/conn.php"; ?>
<?php require_once "./actions/conn.php"; ?>
<?php $productId = $_GET['q']; ?>
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
            <div class="row mb-5">
                <nav class="navbar navbar-expand-lg navbar-light w-100 bg-info fixed-top">
                    <div class="container">
                        <a class="navbar-brand text-white" href="./">
                            <h4> <b>EMCRAFTS Website</b></h4>
                        </a>
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
            <div></div>
            <div class="container py-3">
                <div class="row" style="min-height: 75vh;">

                    <?php
                    $sql = "SELECT * FROM `products` where id='$productId'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col">
                            <div class="">
                                <img src="./images/<?php echo $row["images"]; ?>" class="card-img-top" alt="Product Image">

                            </div>
                        </div>
                        <div class="col">
                            <div class="p-5" style="width:100vh">

                                <div class="">
                                    <h1>
                                        <?php print($row["name"]); ?>
                                    </h1>
                                    </d>

                                    <p class="card-text">
                                    <h4>Description</h4>
                                    <?php echo $row["decription"]; ?>
                                    </p>
                                    <p class="card-text">
                                    <h4>Impact</h4>
                                    <?php echo $row["impact"]; ?>
                                    </p>
                                    <b class="card-text">
                                        Price: <?php echo $row["price"]; ?> rwf
                                    </b>
                                    <form action="handlePayment.php" method="post">
                                        <div class="card px-2 py-1">
                                            <div class="py-2">
                                                <label for="">Names</label>
                                                <input type="text" required name="names" class="form-control"
                                                    placeholder="Enter your names">
                                            </div>
                                            <div class="py-2">
                                                <label for="">Phone</label>
                                                <input type="tel" required name="phone" class="form-control"
                                                    placeholder="Enter your Phone Number">
                                            </div>
                                            <div class="py-2">
                                                <label for="">Email</label>
                                                <input type="email" required name="email" class="form-control"
                                                    placeholder="Enter Email Address">
                                            </div>
                                            <div class="py-2">
                                                <input type="hidden" required name="id" value="<?php echo $row["id"]; ?>"
                                                    class="form-control">
                                                <input type="hidden" required name="prodName" value="<?php echo $row["name"]; ?>"
                                                    class="form-control">
                                                <input type="hidden" required name="price" value="<?php echo $row["price"]; ?>"
                                                    class="form-control" placeholder="Enter your Phone Number">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Pay Now</button>
                                        </div>
                                    </form>
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