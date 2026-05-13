<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit();
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['upload'])){

$targetDir = "uploads/";

// ensure folder exists
if(!is_dir($targetDir)){
mkdir($targetDir,0777,true);
}

$filename = basename($_FILES['file']['name']);
$tmp = $_FILES['file']['tmp_name'];

// rename file to avoid duplicates
$newName = time()."_".$filename;

$path = $targetDir.$newName;

if(move_uploaded_file($tmp,$path)){

mysqli_query($conn,"INSERT INTO documents
(user_id,filename,filepath,upload_date)
VALUES('$user_id','$newName','$path',NOW())");

echo "File Uploaded Successfully";

}else{

echo "File Upload Failed";

}

}
?>

<h2>Upload File</h2>

<form method="post" enctype="multipart/form-data">

<input type="file" name="file" required><br><br>

<button name="upload">Upload</button>

</form>

<br>

<a href="dashboard.php">Back</a>