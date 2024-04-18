<?php
define('TITLE','Change Password');
include '../dbconnect.php';
include 'include/header.php';
session_start();
if($_SESSION['is_alogin'])
{
    $aemail= $_SESSION['aemail'];
}
else
{
    header("location:adminlogin.php");
}
    
    if(isset($_POST['update']))
    {
        $newpass=$_POST['acpass'];
        if(empty($newpass))
        {
            $passerr=" * Password Required";
        }
        else
        {
            $sql="UPDATE `admin_login` SET `password`='$newpass' WHERE `admin_login`.`email`='$aemail'";
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

?>
<div class="col-sm-5 col-md-6">
    <form class="mt-4 mx-5"action="" method="post" class="mx-5">
        <div>
            <label for="aemail">Email</label><input type="email" class="form-control" name="aemail" id="aemail" readonly
               value="<?php if(isset($aemail)) echo $aemail; ?>" >
        </div>
        <div>
            <label for="acpass">New Password</label><input class="form-control" type="text" name="acpass" id="acpass">
           <span class="text-danger"> <?php if(isset($passerr)) echo $passerr; ?></span>
        </div>
        <button type="submit" class="btn btn-success mt-3" name="update">Update</button>
        <button type="reset" class="btn btn-secondary mt-3">Reset</button>
        <?php if(isset($showalert)) echo $showalert; ?>
        <?php if(isset($showerr)) echo $showerr; ?>
    </form>
</div>

<?php
include 'include/footer.php';
?>