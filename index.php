<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <title>OSC</title>
</head>

<body>
    <!-- Navbar section -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-success pl-5 fixed-top">
        <a href="index.php" class="navbar-brand">OSC</a>
        <span class="navbar-text">Happy Customers are our Priority</span>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="requester/login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <!-- Navbar section end -->

    <!-- background image -->
    <header class="back-image" style="background-image:url(images/front_page.jpg);">
        <div class="position">
            <h2>Welcome to our OSC</h2>
            <a href="requester/login.php" class="btn btn-success mr-4">Login</a>
            <a href="#registration" class="btn btn-danger">Signup</a>
        </div>
    </header>
    <!-- background image end -->

    <!-- services section -->
    <div class="container text-center mt-4 border-bottom" id="services">
        <h2>Services</h2>
        <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fa-solid fa-tv fa-6x"></i></a>
                <h4 class="mt-4">Computers</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fa-solid fa-screwdriver-wrench fa-6x"></i></a>
                <h4 class="mt-4">Maintenance</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fa-solid fa-gears fa-6x"></i></a>
                <h4 class="mt-4">Repair</h4>
            </div>
        </div>
    </div>
        <!-- services section end -->

        <!-- registration section -->
        <?php include 'requester/registration.php'; ?>
    <!-- registration section end -->

    <!-- contact section -->
    <?php include 'requester/contact.php'; ?>
    <!-- contact section end -->
    
    <!-- footer section -->
    <footer class="container-fluid bg-dark mt-3 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6">
                    <span class="pr-2">Follow Us:</span>
                    <a href="#" class="pr-2 fi-color"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="pr-2 fi-color"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="pr-2 fi-color"><i class="fa-brands fa-instagram"></i></a>
                </div>
                <div class="col-md-6">
                    <small class=" ml-2"><a href="admin/adminlogin.php" class="text-decoration-none text-white">Admin Login</a></small>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section end -->

    <script src="js/jquery.min.js"></script>
    <script src="js/pooper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>