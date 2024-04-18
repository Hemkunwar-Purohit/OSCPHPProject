<?php
define('TITLE','Work Order');
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
?>
<!-- start 2nd column -->
<div class="col-sm-5 mt-5 mx-5">
    <?php
    if(isset($_POST['view']))
    {
        $sql="SELECT * FROM `assign_work` WHERE `request_id`='{$_POST['id']}'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);

    }    
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
                <td>Technician</td>
                <td><?php if(isset($row['request_assign'])) echo $row['request_assign']; ?> </td>
            </tr>
            <tr>
                <td>Assign Date</td>
                <td><?php if(isset($row['request_date'])) echo $row['request_date']; ?> </td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <form action="" class="mb-3 d-print-none d-inline">
            <input class="btn btn-danger" type="submit" value="Print" onclick="window.print()">
        </form>
        <form action="work_order.php" class="mb-3 d-inline">
        <input type="submit" class="btn btn-secondary" value="Back">
        </form>
    </div>
</div>





<!-- end 2nd column -->


<?php
include 'include/footer.php';
?>