<!DOCTYPE html>
<html>
<head>
    <title>Select Panchayat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-top: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .start-chat-button {
            padding: 5px 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected panchayat value
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
    $sql = "SELECT username FROM users WHERE panchayath = '$selectedPanchayat'";
    $result = $conn->query($sql);

    

    // Display the users
    if ($result->num_rows > 0) {
        echo "<h2>User List</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td><button class='start-chat-button' onclick=\"startChat(" . $row['id'] . ")\">Start Chat</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No users found in the selected panchayat.";
    }

    // Close the database connection
    $conn->close();
}
?>

<h2>Select Panchayat</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="panchayat">Select a panchayat to view users:</label>
    <select name="panchayat" id="panchayat">
        <?php
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

        // Fetch unique panchayat names from the users table
        $sql = "SELECT DISTINCT panchayath FROM users";
        $result = $conn->query($sql);

        // Display panchayat names as options in the dropdown menu
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['panchayath'] . "'>" . $row['panchayath'] . "</option>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </select>

    <button type="submit">View Users</button>
</form>

<script>
    function startChat(userId) {
        // You can implement your logic here to handle the "Start Chat" button click
        // For example, redirect to a chat page with the selected user ID
        window.location.href = 'chat.php?userId=' + userId;
    }
</script>

</body>
</html>
