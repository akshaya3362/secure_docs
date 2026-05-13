<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
}

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM documents WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

unlink($row['filepath']);

mysqli_query($conn,
"DELETE FROM documents WHERE id='$id'");

header("Location: view_files.php");