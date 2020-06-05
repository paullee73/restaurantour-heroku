<?php 

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
}
$sql="SELECT * FROM reviews WHERE reviewID='$_POST[reviewID]'";
echo $sql;
$deleteID = NULL;
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	$deleteID = $row['userID']; 
}

session_start();
if($_SESSION["currID"] != $deleteID){
	header("Location: http://localhost/site/empty.html");
}
else{
	$sql="DELETE FROM reviews WHERE reviewID='$_POST[reviewID]'";

	mysqli_query($con, $sql);

	header("Location: http://localhost/site/index.html");
}

?>