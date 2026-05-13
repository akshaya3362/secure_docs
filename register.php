<?php
session_start();
include "db.php";

if(isset($_SESSION['user_id'])){
header("Location: dashboard.php");
exit();
}

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($check) > 0){

echo "Email already registered";

}else{

$sql = "INSERT INTO users (name,email,password)
VALUES ('$name','$email','$password')";

if(mysqli_query($conn,$sql)){

echo "Registration successful! <a href='login.php'>Login here</a>";

}else{

echo "Error: ".mysqli_error($conn);

}

}

}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register</title>
</head>

<body>

<h2>Register</h2>

<form method="post">

Name <br>
<input type="text" name="name" required>
<br><br>

Email <br>
<input type="email" name="email" required>
<br><br>

Password <br>
<input type="password" name="password" required>
<br><br>

<button type="submit" name="register">Register</button>

</form>

<br>

Already have an account?  
<a href="login.php">Login</a>

</body>
</html>