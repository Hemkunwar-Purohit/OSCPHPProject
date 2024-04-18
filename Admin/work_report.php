<?php
define('TITLE','Work Report');
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

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <form action="" method="POST" class="d-print-none">
        <div class="row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>To
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group col-md-1">
                <input type="submit" class="btn btn-secondary" name="search" value="Search">
            </div>
        </div>
    </form>
    
    <?php

if(isset($_POST['search']))
{
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    
    $sql="SELECT * FROM `assign_work` WHERE `request_date` BETWEEN '$startdate' AND '$enddate'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo '<p class="bg-dark text-white p-2 mt-4">Details</p>
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Request Id</th>
            <th scope="col">Request Info</th>
            <th scope="col">Description</th>                                                       
            <th scope="col">Name</th>                                                       
            <th scope="col">Address</th>                                                                          
            <th scope="col">City</th>                                                       
            <th scope="col">State</th>                                                       
            <th scope="col">Pincode</th>                                                       
            <th scope="col">Email</th>                                                       
            <th scope="col">Mobile</th>                                                       
            <th scope="col">Technician</th>                                                       
            <th scope="col">Date</th>                                                       
            </tr>
            </thead>
            <tbody>                            
            <tr>
            <td>'.$row['request_id'].'</td>
            <td>'.$row['request_info'].'</td>
            <td>'.$row['request_desc'].'</td>
            <td>'.$row['request_name'].'</td>
            <td>'.$row['request_address1'].'</td>
            <td>'.$row['request_city'].'</td>
            <td>'.$row['request_state'].'</td>
            <td>'.$row['request_pin'].'</td>
            <td>'.$row['request_email'].'</td>
            <td>'.$row['request_mobile'].'</td>
            <td>'.$row['request_assign'].'</td>
            <td>'.$row['request_date'].'</td>                                                                                               
            </tr>
            <tr>
            <td>
            <input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">
            </td>
            </tr>
            </tbody>
            </table>
            </div>'; 
        }     
                }                          
                    else
                    {
                        echo '<div class="alert alert-warning col-sm-4 ml-5 mt-4"> No Record Found</div>';
                    }
                    
                }                            
                
                ?>
  </div>   

    <?php
include 'include/footer.php';
?>