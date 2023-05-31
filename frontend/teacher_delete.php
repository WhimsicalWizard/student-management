<?php
include_once('dbcon.php');
$id=$_GET['id'];
$result= mysqli_query($con,  "delete from teacher where id='$id'");
if(!$result) die("Failed to delete: ".mysqli_error($con));
echo "<script>window.location.href = 'index.php';</script>";
echo "<script>alert('Data deleted successfully');</script>";
?>