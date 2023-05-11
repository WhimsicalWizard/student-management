<?php
include('dbcon.php'); // Include your database connection file

$username = $_POST['uname'];
$password = $_POST['password'];

// Prepare and execute the query
$query = "SELECT * FROM users WHERE first_name = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

//check for the valid info for login 
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    if ($data['password'] === $password) {
        echo "<h1>Login successful</h1>";
        echo "<script>window.location.assign('index.php');</script>";
        exit();
    } else {
        echo "<h1>Login unsuccessful</h1>";
    }
} else {
    echo "<h1>Invalid credentials</h1>";
}

mysqli_stmt_close($stmt); // Close the prepared statement
mysqli_close($con); // Close the database connection
?>
