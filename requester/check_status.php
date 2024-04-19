<?php
define ('TITLE','Check Status');
define ('PAGE','Check Status');
include '../include_custmor/header.php';
include '../dbconnect.php';
session_start();
if($_SESSION['is_login'])
{
    $remail=$_SESSION['remail'];
}
else
{
    header("location:requester/login.php");
}
?>
<!-- start 2nd column -->
<div class="col-sm-5 mt-5 mx-5">
    <form action="" method="POST" class="row row-cols-lg-auto g-3 align-items-center d-print-none">
        <div class="form group">
            <label for="checkid">Enter Request ID: </label>
            <input type="number" class="form-control" name="checkid" id="checkid">
            </div>
        <div>
            <button type="submit" class="btn btn-success mt-4" name="submit">Search</button>
        </div>
    </form>

    <?php
    if(isset($_POST['submit']))
    {
        if(empty($_POST['checkid']))
        {
            echo "*Request Id required";
        }
        else
        {

            $sql="SELECT * FROM `assign_work` WHERE `REQUEST_ID`='{$_POST['checkid']}'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if($row==0)
            {
                echo '<div class="alert alert-warning mt-4"> Your Request is still Panding</div>';
            }
            else
            {           
                
                ?>
    <h3 class="text-center mt-5">Assign Work Details</h3>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td><?php if(isset($row['request_id'])) echo $row['request_id']; ?> </td>
            </tr>
            <tr>
                <td>Request Info</td>
                <td><?php if(isset($row['request_info'])) echo $row['request_info']; ?> </td>
            </tr>
            <tr>
                <td>Request Description</td>
                <td><?php if(isset($row['request_desc'])) echo $row['request_desc']; ?> </td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php if(isset($row['request_name'])) echo $row['request_name']; ?> </td>
            </tr>
            <tr>
                <td>Address Line 1</td>
                <td><?php if(isset($row['request_address1'])) echo $row['request_address1']; ?> </td>
            </tr>
            <tr>
                <td>Address Line 2</td>
                <td><?php if(isset($row['request_address2'])) echo $row['request_address2']; ?> </td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php if(isset($row['request_city'])) echo $row['request_city']; ?> </td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php if(isset($row['request_state'])) echo $row['request_state']; ?> </td>
            </tr>
            <tr>
                <td>Pincode</td>
                <td><?php if(isset($row['request_pin'])) echo $row['request_pin']; ?> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php if(isset($row['request_email'])) echo $row['request_email']; ?> </td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?php if(isset($row['request_mobile'])) echo $row['request_mobile']; ?> </td>
            </tr>
            <tr>
                <td>Assign Date</td>
                <td><?php if(isset($row['request_date'])) echo $row['request_date']; ?> </td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <form action="" class="mb-3 d-print-none">
            <input class="btn btn-danger" type="submit" value="Print" onclick="window.print()" >
            <input type="submit" class="btn btn-secondary" value="Close">
        </form>
    </div>
    <?php } 
}

}
?>
</div>
<!-- end 2nd column -->





<?php
    include '../include_custmor/footer.php';
  ?>