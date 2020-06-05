<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
}

$sql="SELECT * FROM dishes NATURAL JOIN restaurants WHERE dishName='$_POST[dishName]' OR restName='$_POST[restName]' OR dishType='$_POST[cuisineName]'";

$result = mysqli_query($con, $sql);

echo "<html lang='en'>
<head>
  <title>Resterauntour</title>
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
    <th scope='col'>Dish Name</th>
    <th scope='col'>Cuisine</th>
    <th scope='col'>Restaurant</th>
  </tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>
    <td>" . $row['dishName'] . "</td>
    <td>" . $row['dishType'] . "</td>
    <td>" . $row['restName'] . "</td>
  </tr>";
}

echo "</tbody>
</table>;
<a href='../searchDishes.html' class='btn btn-info' role='button'>Go Back</a>";
?>



