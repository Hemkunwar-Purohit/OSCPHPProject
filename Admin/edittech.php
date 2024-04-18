<?php
define('TITLE','Update Technician');
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

$sql="SELECT * FROM `technician` WHERE `id`='{$_POST['id']}'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    if($_POST['techname']=="" || $_POST['techcity']=="" || $_POST['techmobile']=="" || $_POST['techemail']=="")
        {
            $fielderr="<div class='alert alert-danger mt-2' role='alert'>
            All fields are Required.
            </div>";
        }
        else
        {
            $techid=$_POST['id'];
            $techname=$_POST['techname'];
            $techcity=$_POST['techcity'];
            $techmobile=$_POST['techmobile'];
            $techemail=$_POST['techemail'];
            $sql= "UPDATE `technician` SET `name`='$techname',`city`='$techcity',`mobile`='$techmobile',`email`='$techemail' WHERE `technician`.`id`=$techid";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $showalert="<div class='alert alert-success mt-2' role='alert'>
                <strong>Success!</strong>Your Record is Updated.
                </div>";
            }
            else
            {
                $showerr="<div class='alert alert-danger mt-2' role='alert'>
                Unable to update.
                </div>".mysqli_error($conn);
            }
         }
}
?>

<div class="col-sm-6 mt-5 mx-3">
    <form action="" method="POST">
        <div class="form-group mb-2">
            <label for="techid">Id</label>
            <input type="text" class="form-control" id="techid" name="id"
                value=" <?php if(isset($row['id'])) { echo $row['id']; } ?>" readonly>
        </div>
        <div class="form-group mb-2">
            <label for="techname">Name</label>
            <input type="text" class="form-control" id="techname" name="techname"
                value=" <?php if(isset($row['name'])) { echo $row['name']; } ?>">
        </div>
        <div class="form-group col">
            <label for="techcity">City</label>
            <input type="text" class="form-control" id="techcity" name="techcity"
                value=" <?php if(isset($row['city'])) { echo $row['city']; } ?>">
        </div>
        <div class="form-group col">
            <label for="techmobile">Mobile</label>
            <input type="tel" class="form-control" id="techmobile" name="techmobile"
                value=" <?php if(isset($row['mobile'])) { echo $row['mobile']; } ?>">
        </div>
        <div class="form-group col">
            <label for="techemail">Email</label>
            <input type="techemail" class="form-control" id="techemail" name="techemail"
                value=" <?php if(isset($row['email'])) { echo $row['email']; } ?>">
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-success" id="update" name="update">update</button>
            <a href="technician.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($fielderr)) echo $fielderr; ?>
        <?php if(isset($showalert)) echo $showalert; ?>
        <?php if(isset($showerr)) echo $showerr; ?>
    </form>
</div>


    <?php
include 'include/footer.php';
?>