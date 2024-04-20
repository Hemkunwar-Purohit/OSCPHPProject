<?php
define ('TITLE','Receipt');
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
    $sql="SELECT * FROM `submit_request` WHERE `sno`={$_SESSION['myid']}";
    $result=mysqli_query($conn,$sql);
    $numRow=mysqli_num_rows($result);
    if($numRow==1)
    {
        $row=mysqli_fetch_assoc($result);
        echo "<div class='col-sm-5 ml-5 mt-5'>
        <table class='table'>
        <tbody>
        <tr>
        <th>Sno</th>
        <td>".$row['sno']."</td>
        </tr>

        <tr>
        <th>Name</th>
        <td>".$row['name']."</td>
        </tr>

        <tr>
        <th>Email ID</th>
        <td>".$row['email']."</td>
        </tr>

        <tr>
        <th>Info</th>
        <td>".$row['info']."</td>
        </tr>

        <tr>
        <th>Description</th>
        <td>".$row['description']."</td>
        </tr>

        <tr>
        <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onclick='window.print()'></form></td>
        </tr>
        </tbody>
        </table>
        </div>";
    }
    else
    {
        echo "failed";
    }

?>

<?php
include '../include_custmor/footer.php';
?>