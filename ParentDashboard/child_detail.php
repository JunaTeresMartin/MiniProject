<!DOCTYPE html>
<html>
<head>
    <style>
        /* styles.css */
        .table-container {
          background-color: black;
          color: white;
        }

        .table-container table {
          width: 100%;
          border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid white;
        }

        .table-container th {
          background-color: #black;
        }

        .table-container tbody tr:nth-child(even) {
          background-color: #black;
        }
    </style>
</head>
<body>
<?php
    // Connect to the database
    $servername = "localhost";
    $localhost = "localhost";

    $username = "root";
    $root="root";
    $password = "";
    $dbname = "paalan";
    $paalan="paalan";

    $conn = new mysqli($localhost, $root, $password, $paalan);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the table
    $sql = "SELECT * FROM child_details" ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display table headers and start the container div
        echo '<div class="table-container"><table>
            <thead>
                <tr>
                    <th>child_name</th>
                    <th>father_name</th>
                    <th>height</th>
                    <th>weight</th>
                </tr>
            </thead>
            <tbody>';

        // Display table rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['child_name']."</td>
                <td>".$row['father_name']."</td>
                <td>".$row['height']."</td>
                <td>".$row['weight']."</td>
            </tr>";
        }

        // Close the table and container div
        echo '</tbody></table></div>';
    } else {
        echo "No data found.";
    }

    // Close the database connection
    $conn->close();
?>
</body>
</html-->

9