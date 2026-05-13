<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload File</title>
</head>

<body>

<h2>Upload File</h2>

<form method="post" enctype="multipart/form-data">

<input type="file" name="file" required>
<br><br>

<button type="submit" name="upload">Upload</button>

</form>

<?php

if(isset($_POST['upload'])){

$user_id = $_SESSION['user_id'];

$targetDir = "upload/";

if(!is_dir($targetDir)){
mkdir($targetDir,0777,true);
}

$fileName = basename($_FILES["file"]["name"]);
$tmpName = $_FILES["file"]["tmp_name"];

$newName = time()."_".$fileName;
$filePath = $targetDir.$newName;

if(move_uploaded_file($tmpName,$filePath)){

$sql="INSERT INTO documents(user_id,filename,filepath)
VALUES('$user_id','$fileName','$filePath')";

mysqli_query($conn,$sql);

echo "<p style='color:green;'>File uploaded successfully</p>";
echo "<a href='view_files.php'>View Files</a>";

}else{
echo "<p style='color:red;'>Upload failed</p>";
}

}

?>

</body>
</html>