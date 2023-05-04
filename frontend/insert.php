<?php
include('dbcon.php');
$firstname =$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$email=$_POST['email'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$time = date('y/m/d', time());;

$sql = "Insert into students (first_name,last_name,e_mail, phone,city,address,dob, create_at) values('$firstname','$lastname','$email','$phone','$city','$address','$dob', '$time')";

if(mysqli_query($con,$sql)){
    echo "The new data were inserted";

}
else echo "There was error inserting the data";

?>