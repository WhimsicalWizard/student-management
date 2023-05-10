<?php
include_once('dbcon.php');
$id=$_GET['id'];
$result= mysqli_query($con,  "delete from students where id='$id'");
if(!$result) die("Failed to delete: ".mysqli_error($con));
echo "Successfully deleted </br>";
echo "<a href='index.php'>View Data</a>>"
?>