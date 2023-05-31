<?php
include('dbcon.php');


if(isset($_POST['submit'])){
$firstname =$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$email=$_POST['email'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$time = date('y/m/d', time());;

$sql = "Insert into teachers (first_name,last_name,e_mail, phone,city,address,dob, update_at) values('$firstname','$lastname','$email','$phone','$city','$address','$dob', '$time')";

if(mysqli_query($con,$sql)){
    echo "<script>window.location.href = 'index.php';</script>";
echo "<script>alert('Data edited successfully');</script>";
}
else echo "There was error inserting the data";

}
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$result = mysqli_query($con, "Select * from teachers where id =$id");
while ($res = mysqli_fetch_array($result)) {
$firstname =$res['first_name'];
$lastname=$res['last_name'];
$address=$res['address'];
$email=$res['e_mail'];
$city=$res['city'];
$phone=$res['phone'];
$dob=$res['dob'];
}
}
else "<font color='red'>The user is missing.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
   
    <link rel="stylesheet" href="style.css">
<script>function validateForm() {
  var firstname = document.getElementById("firstname").value;
  var lastname = document.getElementById("lastname").value;
  var dob = document.getElementById("dob").value;
  var address = document.getElementById("address").value;
  var city = document.getElementById("city").value;
  var email = document.getElementById("email").value;


  if (firstname.trim() === '' || lastname.trim() === '' || gender === '' || address.trim() === '' || city.trim() === '' || email.trim() === '' ) {
      alert("All fields are required.");
      return false;
  }
  var namePattern = /^[a-zA-Z\s]+$/;

  if (!namePattern.test(firstname)) {
    alert("Please enter a valid first name.");
    return false;
  }


  if (!namePattern.test(lastname)) {
    alert("Please enter a valid last name.");
    return false;
  }

  if (!emailIsValid(email)) {
      alert("Invalid email format.");
      return false;
  }

  return true;
}

function emailIsValid(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}
</script>
</head>
<body>
 
 
  <h1>Fill The Form</h1>
  <div class="container-first">
  <div class="container">

     <form name="Register" action="teacher_edit.php" method="post" onsubmit="return validateForm()">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname"  value ="<?php echo $firstname ?>" required> 
       
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value ="<?php echo $lastname ?>" required>
     
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob"value ="<?php echo $dob ?>"  required>
        
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value ="<?php echo $address ?>"  required>

        <label for="city">City</label>
        <input type="text" id="city" name="city" value ="<?php echo $city ?>" required>

        <label for="phoneNumber">Ph Num</label>
        <input type="number" id ="phone" name="phone" value ="<?php echo $phone ?>" >
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value ="<?php echo $email?>" >
        
        <input type="submit" name="submit" value="Submit">
    
      </form>
    </div>
  </div>
</body>