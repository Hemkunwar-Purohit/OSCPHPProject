<?php
define('TITLE','Request');
define('PAGE','Request');
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

<!-- start second column  -->
<div class="col-sm-4 mb-5">
    <?php
        $sql="SELECT * FROM `submit_request`";
        $result=mysqli_query($conn,$sql);
        $numRow=mysqli_num_rows($result);
        if($numRow>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<div class='card mt-5 mx-5'>
                    <div class='card-header'>
                    Request ID:".$row['sno']." 
                    </div>
                    <div class='card-body'>
                    <h5 class='card-title'>Request Info:".$row['info']."</h5>
                    <p class='card-text'>".$row['description']."</p>
                    <p class='card-text'>Request Date:".$row['date']."</p>
                    <div class='float-end'>
                    <form action='' method='POST'>
                    <input type='hidden' name='id' value=".$row['sno'].">
                    <input type='submit' class='btn btn-success mr-3' name='view' value='View'>
                    <input type='submit' class='btn btn-secondary mr-3' name='close' value='close'>
                    </form>
                    </div>
                    </div>
                    </div>";
            }
        } 
        ?>
</div>
<!-- end second column  -->

<?php
if(isset($_POST['view']))
{
    $sql="SELECT * FROM `submit_request` WHERE `sno`='{$_POST['id']}'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
}

if(isset($_POST['close']))
{
    $sql="DELETE FROM `submit_request` WHERE `sno`='{$_POST['id']}'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
    echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
    }
    else
    {
        $showalert="<div class='alert alert-danger mt-2 alert-dismissible fade show' role='alert'>
                    Unable to delete
                    <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
    }

} 

if(isset($_POST['assign']))
    {
        if($_POST['request_id']=="" || $_POST['request_info']=="" || $_POST['request_desc']=="" || $_POST['request_name']=="" || $_POST['request_address1']=="" ||$_POST['request_address2']=="" || $_POST['request_city']=="" ||$_POST['request_state']=="" || $_POST['request_pin']=="" || $_POST['request_email']=="" || $_POST['request_mobile']=="" || $_POST['request_assign']=="" || $_POST['request_date']=="")
        {
            $fielderr="<div class='alert alert-danger mt-2 alert-dismissible fade show' role='alert'>
            All fields are Required.
            <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        else
        {
            $request_id=$_POST['request_id'];
            $request_info=$_POST['request_info'];
            $request_desc=$_POST['request_desc'];
            $request_name=$_POST['request_name'];
            $request_address1=$_POST['request_address1'];
            $request_address2=$_POST['request_address2'];
            $request_city=$_POST['request_city'];
            $request_state=$_POST['request_state'];
            $request_pin=$_POST['request_pin'];
            $request_email=$_POST['request_email'];
            $request_assign=$_POST['request_assign'];
            $request_mobile=$_POST['request_mobile'];
            $request_date=$_POST['request_date'];

            $sql="INSERT INTO `assign_work`(`request_id`,`request_info`,`request_desc`,`request_name`,`request_address1`,`request_address2`,`request_city`,`request_state`,`request_pin`,`request_email`,`request_mobile`,`request_assign`,`request_date`)VALUE('$request_id','$request_info','$request_desc','$request_name','$request_address1','$request_address2','$request_city','$request_state','$request_pin','$request_email','$request_mobile','$request_assign','$request_date')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                 $alert= "<div class='alert alert-success mt-2' role='alert'>
                <strong>Success!</strong>Record submitted successfully.
                </div>";
                
            }
            else
            {
                $error= "<div class='alert alert-danger mt-2' role='alert'>
                Record not submitted.
                </div>";
            }
        }
    }

?>

<!-- start third column  -->
<?php
include 'assign_workform.php';
?>


<?php
include 'include/footer.php';
?>