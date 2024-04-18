<?php
define('TITLE','Technician');
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
    <p class="bg-dark text-white p-2">List of Technician</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $sql="SELECT * FROM `technician`";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_num_rows($result);
                    if($row>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        {
                           echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['city'].'</td>
                            <td>'.$row['mobile'].'</td>
                            <td>'.$row['email'].'</td>  
                            <td>
                            <form action="edittech.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="'.$row['id'].'"><button class="btn btn-success" name="edit" value="edit" type="submit">Edit</button>
                            </form>
                            <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="'.$row['id'].'"><button class="btn btn-danger" name="delete" value="Delete" type="submit">Delete</button>
                            </form>
                            </td>
                            </tr>
                            </tbody>
                            </table>';                                  
                        }
                    }                                        
                    else
                    {
                        echo "0 Result";
                    }        
                    
                    if(isset($_POST['delete']))
                    {
                            $sql="DELETE FROM `technician` WHERE `id`='{$_POST['id']}'";
                            $result=mysqli_query($conn,$sql);
                            if($result)
                        {
                            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                        } 
                            else
                        {
                            echo "Unable to delete".mysqli_error($conn);
                        }                        
                    }

                    ?>

<div class="float-end"><a href="inserttech.php" class="btn btn-danger"><i
            class="fa-solid fa-plus"></i></a>
</div>
</div>

<?php
include 'include/footer.php';
?>