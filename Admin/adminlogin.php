<?php
include '../dbconnect.php';

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['alogin']))
    {
        $aemail=$_POST['aemail'];
        $apassword=$_POST['apassword'];

        if(empty($aemail))
        {
            $emailerr="* Email is required";    
        }
        elseif(empty($apassword))
        {
            $passworderr="* Password is required";
        }
        else
        {
            $sql="SELECT * FROM `admin_login` WHERE `email`='$aemail' AND `password`='$apassword' LIMIT 1"; 
            $result=mysqli_query($conn,$sql);
            $numrows=mysqli_num_rows($result);
            if($numrows==1)
            {
                session_start();
                $_SESSION['is_alogin']=true;
                $_SESSION['aemail'] =$aemail;  
                header("location:dashboard.php");
            }
            else
            {
                $showerr= "<div class='alert alert-danger mt-2' role='alert'>
                <strong>Login Failed!</strong> Invalid credentials.
                </div>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Login</title>
</head>
<body>
    <div class="text-center mb-3 mt-5 " style="font-size: 30px;">
        <span class="text-success" >Online Service Center</span>
        <div class="text-success text-opacity-75 fs-4">Admin Panel</div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4" method="POST">
                 <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="aemail">  
                    <span class="text-danger"><?php if(isset($emailerr)) echo $emailerr; ?></span>                  
                </div>
                <div class="form-text mb-3 ml-5">We'll never share your email with anyone else.</div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="apassword"> 
                    <span class="text-danger"><?php if(isset($passworderr)) echo $passworderr; ?></span>                   
                </div>
                <button type="submit" name="alogin" class="d-grid gap-2 col-6 mx-auto btn btn-primary mt-3">Login</button>
                <?php if(isset($showerr)) echo $showerr; ?>
            </form>
             <div class="text-center"><a href="../index.php" class="btn btn-outline-dark mt-4 shadow-sm">Back to Home</a></div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/pooper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>