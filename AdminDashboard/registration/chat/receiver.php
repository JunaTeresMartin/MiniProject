<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Retrieve the messages from the database (adjust the database connection details accordingly)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'registration';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM messages WHERE sender_id = :sender_id");

    // Bind parameters
    $stmt->bindParam(':sender_id', $_SESSION['user_id']);

    // Execute the statement
    $stmt->execute();

    // Fetch all rows
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'messages' => $messages]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
