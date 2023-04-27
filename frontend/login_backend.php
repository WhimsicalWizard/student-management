<?php
include('dbcon.php');
$username = $_POST['uname'];  
$password = $_POST['password'];  
$host = "localhost";
$db_name ="bca2077";
$user= "root";
$password ="";

$stmt = $con->prepare("select *from students where first_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt_result =$stmt->get_result();
if($stmt_result->num_rows>0){
$data=$stmt_result->fetch_assoc();
if($data['address']==$password){
    echo "<h1>login successfull</h1>";
}
else {
    echo "<h1>login unsuccessfull</h1>";
}}
else {
echo "<h1>Invalid credentials</h1>";
}

?>