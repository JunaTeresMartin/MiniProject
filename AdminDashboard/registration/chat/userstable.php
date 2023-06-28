<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<style>
    /* CSS styles here */
</style>
<body>
    <h2>User List</h2>

    <?php
// Check if a panchayat is selected
if (isset($_POST['panchayat'])) {
    $selectedPanchayat = $_POST['panchayat'];

    // Connect to the database (replace with your own credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch users with the selected panchayat
    $sql = "SELECT * FROM users WHERE panchayath = '$selectedPanchayat'";
    $result = $conn->query($sql);

    // Display users with "Start Chat" button
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Username</th><th>Start Chat</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td><button onclick="startChat(' . $row['id'] . ')">Start Chat</button></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No users found in the selected panchayat.';
    }

    // Close the database connection
    $conn->close();
} else {
    echo 'Please select a panchayat to view users.';
}
?>

<script>
    function startChat(userId) {
        // You can implement your logic here to handle the "Start Chat" button click
        // For example, redirect to a chat page with the selected user ID
        window.location.href = 'chat.php?userId=' + userId;
    }
</script>


</body>
</html>
