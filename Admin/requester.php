<?php
define('TITLE','Request');
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


<div class="col-sm-9 col-md-8 mt-5 text-center">
    <p class="bg-dark text-white p-2">List of Requesters</p>
    <table class="table">
            <thead>
                <tr>
                    <th scope="col">Request Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>                                                       
                </tr>
            </thead>
            <tbody>
                    <?php
                    $sql="SELECT * FROM `user_signup`";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    if($row>0)
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



<?php
include 'include/footer.php';
?>