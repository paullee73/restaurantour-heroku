<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
}
$username = $_POST["usrname"];
$password = $_POST["pass"];
$hashedPass= hash('sha256', $password);

$sql="SELECT * FROM users WHERE uname='$_POST[usrname]' AND pass='$hashedPass'";
if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con, $sql);

$currUser = NULL;
$currID = NULL;
while($row = mysqli_fetch_array($result)) {
	$currUser = $row['uname']; 
	$currID = $row['userID']; 
}

if(is_null($currUser) and is_null($currID)){
	header("Location: http://localhost/site/empty.html");
}
else{
	session_start();
	$_SESSION["currUser"]=$currUser;
	$_SESSION["currID"]=$currID;
	header("Location: http://localhost/site/index.html");
}

?>
