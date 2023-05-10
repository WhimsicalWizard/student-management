<html>

<head>
    <title>HomePage</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <a href="register.html">Add New Data</a><br /><br />
    <!-- creating table -->
    <div class="top">
    <table>
        
        <tr class="tabletop">
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Update</td>
        </tr>
        

<?php
include('dbcon.php');

$sql = "SELECT * FROM students";
$current_date = date("Y-m-d");
$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        $dob = date_create($row['dob']);
        $age = date_diff($dob, date_create($current_date))->y;
        echo "<tr>";
        echo "<td>" . $row['first_name'] ." ".  $row['last_name'] . "</td>";
        echo "<td>" . $age . "</td>";
        echo "<td>" . $row['e_mail'] . "</td>";
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a>
            <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        echo "</tr>";
    }
}

?>
    </table>
</div>
</body>
</html>