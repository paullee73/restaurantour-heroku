<?php

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
}

$sql="SELECT * FROM restaurants WHERE restID='$_POST[restID]'";
$result = mysqli_query($con, $sql);
$restName = NULL;
while($row = mysqli_fetch_array($result)) {
	$restName = $row['restName'];
}
session_start();
$sql="INSERT INTO dishes (dishName, dishType, restID)
VALUES
('$_POST[dishName]','$_POST[cuisineType]' , $_POST[restID])";
// echo $sql;
$result = mysqli_query($con, $sql);
mysqli_close($con);
header("Location: http://localhost/site/index.html"); 
?>