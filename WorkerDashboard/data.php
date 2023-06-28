<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paalan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the table
$sql = "SELECT child_name, height, weight FROM child_details";
$result = $conn->query($sql);

// Create arrays to store data
$names = array();
$heights = array();
$weights = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $names[] = $row["child_name"];
        $heights[] = $row["height"];
        $weights[] = $row["weight"];
    }
} else {
    echo "No data found";
}

// Close the database connection
$conn->close();

// Return the data as JSON
$data = array(
    "names" => $names,
    "heights" => $heights,
    "weights" => $weights
);

header('Content-Type: application/json');
echo json_encode($data);
?>
