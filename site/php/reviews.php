<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
}

$sql="SELECT * FROM users WHERE uname='$_POST[username]'";

$uID = 0;

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)) {
	$uID = $row['userID'];
}

$sql2="SELECT * FROM reviews WHERE restName='$_POST[restName]' OR userID = $uID";

$result2 = mysqli_query($con, $sql2);

echo ("<html lang='en'>
<head>
  <title>Search Review Results</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
</head>
<body>
<table class='table'>
<thead>
  <tr>
    <th scope='col'>User ID</th>
    <th scope='col'>Restaurant Name</th>
    <th scope='col'>Review Text</th>
    <th scope='col'>Rating</th>
  </tr>
</thead>
<tbody>");

while($row = mysqli_fetch_array($result2)) {
    echo ("<tr>
    <td>".$row['userID']."</td>
    <td>".$row['restName']."</td>
    <td>".$row['reviewText']."</td>
    <td>".$row['rating']."</td>
    <td> 
        <form action = './deleteReview.php' method='post'>
        <input type='hidden' name='reviewID' value='".$row['reviewID']."'/>
        <input type='submit' value='Delete'/>
        </form>
    </td>
    <td> 
      <a href='../editForm.html' class='btn btn-info' role='button'>Update</a>
    </td>
</td>
  </tr>");
}

echo "</tbody>
</table>
<a href='../review.html' class='btn btn-info' role='button'>Go Back</a>";

?>



