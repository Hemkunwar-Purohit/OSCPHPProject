<?php
define ('TITLE','Profile');
define ('PAGE','Profile');
include '../include_custmor/header.php';
include '../dbconnect.php';
session_start();
if($_SESSION['is_login'])
{
    $remail=$_SESSION['remail'];
}
else
{
    header("location:login.php");
}

$sql="SELECT `name` FROM `user_signup` WHERE `email`='$remail'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];

if(isset($_POST['update']))
{
    if(empty($name))
    {
        $nameerr= "* Name Required";
    }
    else
    {
        $rname=$_POST['rname'];
        $sql= "UPDATE `user_signup` SET `name`='$rname' WHERE `user_signup`.`email`='$remail'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $showalert="<div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Your Name is Successfully Updated.
            <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        else
        {
            $showerr="<div class='alert alert-danger mt-2 alert-dismissible fade show' role='alert'>
            Unable to update.
            <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

    }
}
?>
            <div class="col-sm-6 mt-5"> <!--start profile area-->
                <form action="" method="post" class="mx-5">
                    <div>
                        <label for="remail">Email</label><input type="email" class="form-control"name="remail" id="remail" readonly value="<?php echo $remail; ?>">
                    </div>
                    <div>
                        <label for="rname">Name</label><input class="form-control" type="text" name="rname" id="rname" value="<?php echo $name; ?>">
                        <span class="text-danger"><?php if(isset($nameerr)) echo $nameerr; ?> </span>
                    </div>
                    <button type="submit" class="btn btn-success mt-3" name="update">Update</button>
                    <?php if(isset($showalert)) echo $showalert;?>
                    <?php if(isset($showerr)) echo $showerr;?>
                </form>
            </div> <!--end profile area-->
        </div>
    </div>
    <!-- End container -->

    <?php
        include '../include_custmor/footer.php';
    ?>