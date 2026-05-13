<?php
$conn = mysqli_connect("localhost","root","","secure_docs",3308);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
