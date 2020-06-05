<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " .
mysqli_connect_error();
 }
$userPassword =  $_POST['pass'];
$hashedPass= hash('sha256', $userPassword);
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO users (uname, pass, roleType)
 VALUES
 ('$_POST[usrname]','$hashedPass', '$_POST[isReviewer]')";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }

 if($_POST['isReviewer'] == "reviewer") {
    $newUserID = NULL;
    $sqlretrieve = "SELECT * FROM users WHERE uname='$_POST[usrname]' ";
    echo ($sqlretrieve);
    $result = mysqli_query($con, $sqlretrieve);
    while($row = mysqli_fetch_array($result)) {
        $newUserID = $row['userID']; 
        echo($newUserID); 
    }

    $sql2="INSERT INTO reviewers (userID)
    VALUES
    ($newUserID)";
    $result = mysqli_query($con, $sql2);
 }

 mysqli_close($con);
 header("Location: http://localhost/site/index.html");
?>