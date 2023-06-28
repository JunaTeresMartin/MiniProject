<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
        // Process the message or perform any necessary actions
        // For testing purposes, you can simply echo the message back
        echo $message;
        exit;
    }
}
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the sender ID from the session
    $senderId = $_SESSION['user_id'];

    // Get the message from the AJAX request
    $message = $_POST['message'] ?? '';

    // Perform the necessary database operations to store the message
    if (!empty($message)) {
        // Your database logic here (e.g., storing the message in the message table)

        // Return a response indicating success
        echo 'Message sent successfully';
    } else {
        // Return a response indicating failure (message is empty)
        echo 'Message is empty';
    }
} else {
    // Return a response indicating failure (user is not logged in)
    echo 'User not logged in';
}
?>
