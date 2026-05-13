<?php
session_start();

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
}
?>

<h2>Dashboard</h2>

<a href="upload.php">Upload Document</a><br><br>

<a href="view_files.php">View My Documents</a><br><br>

<a href="logout.php">Logout</a>