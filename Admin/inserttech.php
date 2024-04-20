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
if(isset($_POST['submit']))
    {
        if($_POST['name']=="" || $_POST['city']=="" || $_POST['email']=="" || $_POST['mobile']=="")
        {
            $fielderr="<div class='alert alert-danger mt-2' role='alert'>
            All fields are Required.
            </div>";
        }
        else
        {
            
            $name=$_POST['name'];
            $city=$_POST['city'];
            $email=$_POST['email'];            
            $mobile=$_POST['mobile'];
            

            $sql="INSERT INTO `technician`(`name`,`city`,`email`,`mobile`)VALUE('$name','$city','$email','$mobile')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                 $alert= "<div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                <strong>Success!</strong>Record submitted successfully.
                <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                
            }
            else
            {
                $error= "<div class='alert alert-danger mt-2 alert-dismissible fade show' role='alert'>
                Record not submitted.
                <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3">
<?php if(isset($alert)) echo $alert; ?>
<?php if(isset($error)) echo $error; ?>
    <h3 class="text-center">Add New Technician</h3>
    <form class="mx-5 shadow-lg p-5" action="" method="POST">
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group col">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="form-group col">
            <label for="mobile">Mobile</label>
            <input type="tel" class="form-control" id="mobile" name="mobile">
        </div>
        <div class="form-group col">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-success" id="submit" name="submit">Submit</button>
            <a href="technician.php" class="btn btn-secondary">Close</a>            
        </div>
        <?php if(isset($fielderr)) echo $fielderr; ?>
    </form>
</div>






<?php
include 'include/footer.php';
?>