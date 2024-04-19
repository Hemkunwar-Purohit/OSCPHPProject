<?php
define('TITLE','Work Order');
define('PAGE','Work Order');
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
<div class="col-sm-9 col-md-10 mt-5">
          <table class="table">
            <thead>
                <tr>
                    <th scope="col">Request Id</th>
                    <th scope="col">Request Info</th>
                    <th scope="col">Request Description</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">city</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Technician</th>
                    <th scope="col">Assigned Date </th>
                    <th scope="col">Action</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM `assign_work`";
                    $result=mysqli_query($conn,$sql);
                    $numRows=mysqli_num_rows($result);
                    if($numRows>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        {
                           echo '<tr>
                            <td>'.$row['request_id'].'</td>
                            <td>'.$row['request_info'].'</td>
                            <td>'.$row['request_desc'].'</td>
                            <td>'.$row['request_name'].'</td>
                            <td>'.$row['request_address2'].'</td>
                            <td>'.$row['request_city'].'</td>
                            <td>'.$row['request_mobile'].'</td>
                            <td>'.$row['request_assign'].'</td>
                            <td>'.$row['request_date'].'</td>
                            <td>
                            <form action="viewassignwork.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="'.$row['request_id'].'"><button class="btn btn-success" name="view" value="view" type="submit">View</button>
                            </form>
                            <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="'.$row['request_id'].'"><button class="btn btn-danger" name="delete" value="Delete" type="submit">Delete</button>
                            </form>
                            </td>
                            </tr>';                            
                        }
                    }
                    else
                    {
                        echo "0 Result";
                    }

                    if(isset($_POST['delete']))
                    {
                        $sql="DELETE FROM `assign_work` WHERE `request_id`='{$_POST['id']}'";
                        $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                            echo '<meta http-equiv="refresh" content="0;URL=?deleted/>';
                        }
                        
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'include/footer.php';
?>