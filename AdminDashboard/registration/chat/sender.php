<?php
session_start();
// Check if the user is logged in


if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Get the message from the request
$message = $_POST['message'];

// Save the message to the database (adjust the database connection details accordingly)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'registration';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO messages (sender_id, message) VALUES (:sender_id, :message)");

    // Bind parameters
    $stmt->bindParam(':sender_id', $_SESSION['user_id']);
    $stmt->bindParam(':message', $message);

    // Execute the statement
    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
