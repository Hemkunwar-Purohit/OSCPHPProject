<?php
    include 'dbconnect.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(isset($_POST['rsignup']))
        {
            $rname=$_POST['rname'];
            $remail=$_POST['remail'];
            $rpassword=$_POST['rpassword'];
            if(empty($rname))
            {
                $nameerr=" * Name is required";
            }
            elseif(empty($remail))
            {
                $emailerr="* Email is required";
            }
            elseif(empty($rpassword))
            {
                $passworderr="* Password is required";
            }
            else
            { 
                $existsql="SELECT `email` FROM `user_signup` WHERE `email`='$remail'";
                $result=mysqli_query($conn,$existsql);
                $numRows=mysqli_num_rows($result);
                if($numRows>0)
                {
                    $emailexist="* Email already exists";
                }
                else
                {
                    $sql="INSERT INTO `user_signup`(`name`,`email`,`password`)VALUE('$rname','$remail',$rpassword)";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $showalert= "<div class='alert alert-success mt-2' role='alert'>
                        <strong>Success!</strong>Your account is now created.
                        </div>";
                    }
                    
                }
            }
         }
      }
   ?>

<div class="container pt-5 border-bottom" id="registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Name" name="rname">
                    <span class="errorcolor text-danger"><?php if(isset($nameerr)) echo $nameerr;?></span>
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="remail">
                    <span class="errorcolor text-danger "><?php if(isset($emailerr)) echo $emailerr; ?></span>
                    <span class="errorcolor text-danger "><?php if(isset($emailexist)) echo $emailexist; ?></span>
                </div>
                <div class="form-text mb-3 ml-5">We'll never share your email with anyone else.</div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="rpassword">
                    <span class="errorcolor text-danger"><?php if(isset($passworderr)) echo $passworderr; ?></span>
                </div>
                <button type="submit" name="rsignup" class="d-grid gap-2 col-6 mx-auto btn btn-primary mt-3">Sign
                    Up</button>
                    <?php if(isset($showalert)) echo $showalert; ?>
            </form>
        </div>
    </div>
</div>