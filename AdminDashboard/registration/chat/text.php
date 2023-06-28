<?php
session_start();


?>


<!DOCTYPE html>
<html>
<head>
    <title>Select Panchayat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            background-color: #075e54;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin: 0;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card {
            padding: 20px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .card-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .start-chat-button {
            padding: 5px 10px;
            background-color: #25D366;
            border: none;
            color: #fff;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
    </style>
</head>
<body>
<div class="container">
    <h2><?php 
       echo $_SESSION['username']; 
    ?></h2>
    
    <div class="card">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="dropdown-container">
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
            </div>

            <button type="submit" class="lets-chat-button">View Users</button>
        </form>
    </div>

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
            echo "<div class='table-container'>";
            echo "<table>";
            echo "<tr><th>Name</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td><button class='start-chat-button' onclick=\"startChat(" . $row['id'] . ")\">Start Chat</button></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "<div class='card'>No users found in the selected panchayat.</div>";
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <script>
        function startChat(userId) {
            // You can implement your logic here to handle the "Start Chat" button click
            // For example, redirect to a chat page with the selected user ID
            window.location.href = 'chatarea.php?userId=' + userId;
        }
    </script>
</div>
</body>
</html>
