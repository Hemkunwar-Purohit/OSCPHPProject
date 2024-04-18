<?php
if(session_id() =="")
{
    session_start();
}
if($_SESSION['is_alogin'])
{
    $aemail= $_SESSION['aemail'];
}
else
{
    header("location:adminlogin.php");
}
?>

<div class="col-sm-6 mt-5">
<?php if(isset($showalert)) echo $showalert; ?>
<?php if(isset($alert)) echo $alert; ?>
<?php if(isset($error)) echo $error; ?>
        <form class="mx-5 shadow-lg p-5" action="" method="POST">
        <h5 class="text-center">Assign Work Order Request</h5>
        <div class="form-group mb-2">
            <label for="info">Request ID</label>
            <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['sno'])){  echo $row['sno']; } ?>" readonly >
        </div>
        <div class="form-group mb-2">
            <label for="info">Request Info</label>
            <input type="text" class="form-control" id="request_info" placeholder="Request Info" name="request_info" value="<?php if(isset($row['info'])){  echo $row['info']; } ?>">
        </div>
        <div class="form-group mb-2">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="request_desc" placeholder="Description" name="request_desc" value="<?php if(isset($row['description'])){  echo $row['description']; } ?>">
        </div>
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="request_name" placeholder="Name" name="request_name" value="<?php if(isset($row['name'])){  echo $row['name']; } ?>">
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="address1">Address Line1</label>
                <input type="text" class="form-control" id="request_address1" placeholder="Address" name="request_address1" value="<?php if(isset($row['address1'])){  echo $row['address1']; } ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="address2">Address Line2</label>
                <input type="text" class="form-control" id="request_address2" placeholder="Address" name="request_address2" value="<?php if(isset($row['address2'])){  echo $row['address2']; } ?>">
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" id="request_city" name="request_city" value="<?php if(isset($row['city'])){  echo $row['city']; } ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" id="request_state" name="request_state" value="<?php if(isset($row['state'])){  echo $row['state']; } ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="pincode">Pincode</label>
                <input type="number" class="form-control" id="request_pin" name="request_pin" value="<?php if(isset($row['pincode'])){  echo $row['pincode']; } ?>">
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="request_email" name="request_email" value="<?php if(isset($row['email'])){  echo $row['email']; } ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" id="request_mobile" name="request_mobile" value="<?php if(isset($row['mobile'])){  echo $row['mobile']; } ?>">
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="assigntech">Assign to Technician</label>
                <input type="text" class="form-control" id="request_assign" name="request_assign">
            </div>
            <div class="form-group col-md-4">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="request_date" name="request_date">
            </div>
        </div>
        <div class="float-end">
            <button type="submit" class="btn btn-success" name="assign">Assign</button>
            <button type="reset" class="btn btn-secondary">Reset</button>            
        </div>      
        <?php if(isset($fielderr)) echo $fielderr; ?>      
    </form>
</div>
