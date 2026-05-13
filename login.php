<?php
session_start();
include "db.php";

if(isset($_SESSION['user_id'])){
header("Location: dashboard.php");
exit();
}

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");

if(mysqli_num_rows($result) > 0){

$row = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $row['id'];

header("Location: dashboard.php");
exit();

}else{

echo "<p style='color:red;'>Invalid Login</p>";

}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<script>
function togglePassword() {

var x = document.getElementById("password");

if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}

}
</script>

</head>

<body>

<h2>Login</h2>

<form method="post">

Email<br>
<input type="email" name="email" required>
<br><br>

Password<br>
<input type="password" name="password" id="password" required>
<br>

<input type="checkbox" onclick="togglePassword()"> Show Password

<br><br>

<button type="submit" name="login">Login</button>

</form>

<br>

Don't have an account?  
<a href="register.php">Register</a>

</body>
</html>