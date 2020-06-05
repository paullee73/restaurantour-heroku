<?php 
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('reviewID', 'restID', 'userID', 'restName', 'reviewText', 'rating'));

// fetch the data
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
$sql="SELECT * FROM reviews";
$result = mysqli_query($con, $sql);

// loop over the rows, outputting them
while ($row = mysqli_fetch_array($result)){
    fputcsv($output, $row);
}
?>