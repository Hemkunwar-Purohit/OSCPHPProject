<?php
define('TITLE','Dashboard');
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

$sql="SELECT COUNT(*) FROM `submit_request`";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);
$submitrequest=$row[0];

$sql="SELECT COUNT(*) FROM `assign_work`";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);
$assignwork=$row[0];

$sql="SELECT COUNT(*) FROM `technician`";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);
$technician=$row[0];
    
?>

<!-- start dashboard -->
<div class="col-sm-9 col-md-10">
    <div class="row text-center mx-5">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style=" max-width:18rem;">
                <div class="card-header">Request received</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $submitrequest; ?></h4>
                    <a class="btn text-white" href="request.php">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style=" max-width:18rem;">
                <div class="card-header">Assigned work</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $assignwork; ?></h4>
                    <a class="btn text-white" href="work_order.php">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style=" max-width:18rem;">
                <div class="card-header">No. of Technician</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $technician; ?></h4>
                    <a class="btn text-white" href="technician.php">View</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white p-2">List of Requests</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM `user_signup`";
                    $result=mysqli_query($conn,$sql);
                    $numRows=mysqli_num_rows($result);
                    if($numRows>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        {
                           echo '<tr>
                            <td>'.$row['sno'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['email'].'</td>
                            </tr>';
                            
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>
<!-- start dashboard -->
</div>
</div>
<!-- End container -->

<?php
include 'include/footer.php';
?>