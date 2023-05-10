<?php
include('dbcon.php');
$sql = "select * from student";

if(mysqli_query($con,$sql)){
    echo "smink";
}

?>