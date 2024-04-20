<?php
define ('TITLE','Submit Request');
define ('PAGE','Submit Request');
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

    if(isset($_POST['submit']))
    {
        if($_POST['info']=="" || $_POST['description']=="" || $_POST['name']=="" || $_POST['address1']=="" ||$_POST['address2']=="" || $_POST['city']=="" ||$_POST['state']=="" || $_POST['pincode']=="" || $_POST['email']=="" || $_POST['mobile']=="" || $_POST['date']=="")
        {
            $fielderr="<div class='alert alert-danger mt-2 alert-dismissible fade show' role='alert'>
            All fields are Required.
            <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        else
        {
            $info=$_POST['info'];
            $description=$_POST['description'];
            $name=$_POST['name'];
            $address1=$_POST['address1'];
            $address2=$_POST['address2'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $pincode=$_POST['pincode'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $date=$_POST['date'];

            $sql="INSERT INTO `submit_request`(`info`,`description`,`name`,`address1`,`address2`,`city`,`state`,`pincode`,`email`,`mobile`,`date`)VALUE('$info','$description','$name','$address1','$address2','$city','$state','$pincode','$email','$mobile','$date')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $genid= mysqli_insert_id($conn);
                $showalert= "<div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                <strong>Success!</strong>Record submitted successfully.
                <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                $_SESSION['myid']=$genid;
                header("location:receipt.php");

            }
            else
            {
                $showerr= "<div class='alert alert-danger mt-2' role='alert'>
                Record not submitted.
                </div>";
            }
        }
    }

?>

<!-- start submit form -->
<div class="col-sm-9 col-md-10 mt-4">
    <form class="mx-5" action="" method="POST">
        <div class="form-group mb-2">
            <label for="info">Request Info</label>
            <input type="text" class="form-control" id="info" placeholder="Request Info" name="info">
        </div>
        <div class="form-group mb-2">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description" name="description">
        </div>
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="address1">Address Line1</label>
                <input type="text" class="form-control" id="address1" placeholder="Address" name="address1">
            </div>
            <div class="form-group col-md-6">
                <label for="address2">Address Line2</label>
                <input type="text" class="form-control" id="address2" placeholder="Address" name="address2">
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="form-group col-md-2">
                <label for="pincode">Pincode</label>
                <input type="number" class="form-control" id="pincode" name="pincode">
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group col-md-2">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="form-group col-md-2">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
        </div>
        <button type="submit" class="btn btn-success" name="submit">submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <?php if(isset($fielderr)) echo $fielderr; ?>
        <?php if(isset($showalert)) echo $showalert; ?>
        <?php if(isset($showerr)) echo $showerr; ?>
    </form>
</div>
<!-- end submit form -->


<?php
include '../include_custmor/footer.php';
?>