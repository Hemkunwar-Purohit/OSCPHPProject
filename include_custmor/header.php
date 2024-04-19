<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title><?php echo TITLE; ?></title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow d-print-none"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="profile.php">OSC</a></nav>

    <!-- start container     -->
    <div class="container-fluid" style= "margin-top:40px;">
        <div class="row">
        <!-- start sidebar -->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav nav-pills flex-column ">
                    <li class="nav-item"><a class="nav-link <?php if(PAGE=='Profile') {  echo 'active'; } ?>" href="profile.php"><i class="fa-regular fa-user"></i> Profile</a></li>
                       <li class="nav-item"><a class="nav-link <?php if(PAGE=='Submit Request') {  echo 'active'; } ?>" href="submit_request.php"><i class="fa-solid fa-check"></i> Submit Request</a></li>
                       <li class="nav-item"><a class="nav-link <?php if(PAGE=='Check Status') {  echo 'active'; } ?>" href="check_status.php"><i class="fa-regular fa-clock"></i> Check Status</a></li>
                       <li class="nav-item"><a class="nav-link <?php if(PAGE=='Change Password') {  echo 'active'; } ?>" href="change_password.php"><i class="fa-solid fa-lock"></i> Change Password</a></li>
                       <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End sidebar -->
            
            
       