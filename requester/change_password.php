<?php
define ('TITLE','Change Password');
define ('PAGE','Change Password');
include '../include_custmor/header.php';
include '../dbconnect.php';

session_start();
if(!$_SESSION['is_login'])
{
    header("location:requester/login.php");
}
else
{
    $remail=$_SESSION['remail'];
    if(isset($_POST['update']))
    {
        $newpass=$_POST['rcpass'];
        if(empty($newpass))
        {
            $passerr=" * Password Required";
        }
        else
        {
            $sql="UPDATE `user_signup` SET `password`='$newpass' WHERE `user_signup`.`email`='$remail'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $showalert="<div class='alert alert-success mt-2' role='alert'>
                <strong>Success!</strong>Password has been Changed successfully.
                </div>";
            }
            else
            {
                $showerr= "<div class='alert alert-danger mt-2' role='alert'>
                Password do not changed.
                </div>";
            }

        }
    }
}
?>
<div class="col-sm-5 col-md-6">
    <form class="mt-4 mx-5"action="" method="post" class="mx-5">
        <div>
            <label for="remail">Email</label><input type="email" class="form-control" name="remail" id="remail" readonly
               value="<?php if(isset($remail)) echo $remail; ?>" >
        </div>
        <div>
            <label for="rcpass">New Password</label><input class="form-control" type="text" name="rcpass" id="rcpass">
           <span class="text-danger"> <?php if(isset($passerr)) echo $passerr; ?></span>
        </div>
        <button type="submit" class="btn btn-success mt-3" name="update">Update</button>
        <button type="reset" class="btn btn-secondary mt-3">Reset</button>
        <?php if(isset($showalert)) echo $showalert; ?>
        <?php if(isset($showerr)) echo $showerr; ?>
    </form>
</div>

<?php
        include '../include_custmor/footer.php';
 ?>