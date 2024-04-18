<?php
$servername="localhost";
$username="root";
$password="";
$database="service_center";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("connection not establish".mysqli_connect_error());
}
?>