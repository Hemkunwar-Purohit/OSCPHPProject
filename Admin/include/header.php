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
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow d-print-none"><a
            class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSC</a></nav>

    <!-- start container     -->
    <div class="container-fluid" style="margin-top:40px;">
        <div class="row">
            <!-- start sidebar -->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a class="nav-link <?php if(PAGE=='Dashboard') {  echo 'active'; } ?>" href="dashboard.php"><i
                                    class="fa-regular fa-user"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE=='Work Order') {  echo 'active'; } ?>" href="work_order.php"><i
                                    class="fa-solid fa-check "></i> Work Order</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE=='Request') {  echo 'active'; } ?>" href="request.php"><i
                                    class="fa-regular fa-bell"></i> Requests</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE=='Technician') {  echo 'active'; } ?>" href="technician.php"><i
                                    class="fa-regular fa-user"></i> Technician</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE=='Requester') {  echo 'active'; } ?>" href="requester.php"><i
                                    class="fa-solid fa-users"></i> Requester</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE=='Work Report') {  echo 'active'; } ?>" href="work_report.php"><i
                                    class="fa-regular fa-clock"></i> Work Report</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE=='Change Password') {  echo 'active'; } ?>" href="change_pass.php"><i
                                    class="fa-solid fa-lock"></i> Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php"><i
                                    class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End sidebar -->