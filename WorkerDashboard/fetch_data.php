<?php
// Include your database connection and query to fetch height and weight data for the selected child
include 'connect.php';

// Get the selected child name from the query parameter
$childName = $_GET['childName'];

// Fetch height data for the selected child from the height_history table
$heightQuery = "SELECT timestamp, height FROM height_history WHERE child_name = '$childName'";
$heightResult = mysqli_query($con, $heightQuery);
$heightData = [];
while ($heightRow = mysqli_fetch_assoc($heightResult)) {
  $heightData[] = [
    'timestamp' => $heightRow['timestamp'],
    'height' => $heightRow['height']
  ];
}

// Fetch weight data for the selected child from the weight_history table
$weightQuery = "SELECT timestamp, weight FROM weight_history WHERE child_name = '$childName'";
$weightResult = mysqli_query($con, $weightQuery);
$weightData = [];
while ($weightRow = mysqli_fetch_assoc($weightResult)) {
  $weightData[] = [
    'timestamp' => $weightRow['timestamp'],
    'weight' => $weightRow['weight']
  ];
}

// Prepare the response as JSON
$response = [
  'height' => $heightData,
  'weight' => $weightData
];

header('Content-Type: application/json');
echo json_encode($response);
?>
