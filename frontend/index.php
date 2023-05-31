<?php
include('dbcon.php');

// Retrieve data for students
$sql_students = "SELECT * FROM students";
$current_date = date("Y-m-d");
$result_students = mysqli_query($con, $sql_students);

// Retrieve data for teachers
$sql_teachers = "SELECT * FROM teacher";
$result_teachers = mysqli_query($con, $sql_teachers);
?>

<html>
<head>
    <title>HomePage</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Menu</h2>
            <?php include('header.html'); ?>
        </div>

        <div class="top">
            <h3>Students</h3>
            <table>
                <tr class="tabletop">
                    <td>Name</td>
                    <td>Age</td>
                    <td>Email</td>
                    <td>Phone</td>

                    <td>Update</td>
                </tr>

                <?php
                if ($result_students) {
                    while ($row = mysqli_fetch_array($result_students)) {
                        $dob = date_create($row['dob']);
                        $age = date_diff($dob, date_create($current_date))->y;
                        echo "<tr>";
                        echo "<td>" . $row['first_name'] ." ".  $row['last_name'] . "</td>";
                        echo "<td>" . $age . "</td>";
                        echo "<td>" . $row['e_mail'] . "</td>";
                        echo "<td>".$row['phone']."</td>";

                        echo "<td><a href=\"student_edit.php?id=$row[id]\">Edit</a>
                            <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>

        <div class="top">
            <h3>Teachers</h3>
            <table>
                <tr class="tabletop">
                    <td>Name</td>
                    <td>Age</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Update</td>
                </tr>

                <?php
                if ($result_teachers) {
                    while ($row = mysqli_fetch_array($result_teachers)) {
                        echo "<tr>";
                        echo "<td>" . $row['first_name'] ." ".  $row['last_name'] . "</td>";
                        echo "<td>" . $age . "</td>";

                        echo "<td>" . $row['e_mail'] . "</td>";
                        echo "<td>".$row['phone']."</td>";
                        echo "<td><a href=\"edit_teacher.php?id=$row[id]\">Edit</a>
                            <a href=\"teacher_delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
