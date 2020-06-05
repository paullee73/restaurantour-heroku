<?php 

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
}
session_start();
$sql="SELECT * FROM reviews WHERE restName='$_POST[restName]' AND userID=$_SESSION[currID]";
$editID = NULL;
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	$editID = $row['reviewID']; 
}

if($_SESSION["currID"] == NULL or $editID == NULL){
	header("Location: http://localhost/site/empty.html");
}
else{
    $sql="UPDATE reviews SET restName='$_POST[restName]', reviewText='$_POST[review]', rating=$_POST[stars]
    WHERE reviewID=$editID";
    echo $sql;
	mysqli_query($con, $sql);

	header("Location: http://localhost/site/index.html");
}

?>