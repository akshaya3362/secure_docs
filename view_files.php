<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

$search="";

if(isset($_GET['search'])){
$search=$_GET['search'];
}

$query="SELECT * FROM documents 
WHERE user_id='$user_id' 
AND filename LIKE '%$search%' 
ORDER BY id DESC";

$result=mysqli_query($conn,$query);
?>

<h2>My Documents</h2>

<form method="GET">

<input type="text" name="search" placeholder="Search file">

<button>Search</button>

</form>

<br>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Date</th>
<th>Open</th>
<th>Delete</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['filename']; ?></td>

<td><?php echo $row['upload_date']; ?></td>

<td>
<a href="<?php echo $row['filepath']; ?>" target="_blank">Open</a>
</td>

<td>
<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">Back</a>