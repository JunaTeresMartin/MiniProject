<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Approval</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }
    
        .navbar h1 {
            margin: 0;
        }
    
        .sidebar {
            width: 180px;
            background-color: #f4f4f4;
            padding: 15px;
            height: calc(100vh - 70px);
            position: fixed;
            top: 70px;
            left: 0;
        }
    
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    
        .sidebar li {
            margin-bottom: 10px;
        }
    
        .sidebar a {
            display: block;
            text-decoration: none;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    
        .sidebar a:hover {
            background-color: #555;
            color: #fff;
        }
    
        .main-content {
            margin-left: 200px;
            padding: 20px;
            margin-top: 70px;
        }
    
        h1 {
            margin-top: 0;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
        }
    
        th, td {
            padding: 10px;
            border: 1px solid #dddddd;
            text-align: left;
        }
    
        th {
            background-color: #f2f2f2;
        }
    
        form {
            display: inline-block;
        }
    
        button {
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 3px;
            border: none;
            cursor: pointer;
        }
    
        .approve {
            background-color: #5cb85c;
            color: #fff;
        }
    
        .reject {
            background-color: #d9534f;
            color: #fff;
        }
        .logo{
	margin: 0px;
	margin-left: 28px;
    font-weight: 30px;
    color: rgb(224, 183, 20);
    margin-bottom: 30px;
    
}
.logo span{
	color: #9c9c9c;
}
    </style>
    <script>
        // JavaScript function to auto-refresh the page
        function autoRefresh() {
            setTimeout(function() {
                location.reload();
            }, 1000); // Refresh the page every 1 second (1000 milliseconds)
        }
    </script>
</head>
<body>
    <div class="navbar">
    <p class="logo"><span>Paa</span>lan</p>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Stocks</a></li>
            <li><a href="#">Orders</a></li>
        </ul>
    </div>

    <div class="main-content">
        
        <?php
    // Create a database connection
    $conn = mysqli_connect("localhost", "root", "", "Stock");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch all pending stock requests
    $sql = "SELECT * FROM stock_requests";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output the stock requests in a table
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Stock Item</th>
                    <th>Quantity</th>
                    <th>Defect Details</th>
                    <th>Action</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['stock_item'] . "</td>
                    <td>" . $row['quantity'] . "</td>
                    <td>" . $row['defect_details'] . "</td>
                    <td>
                        <form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                            <input type='hidden' name='request_id' value='" . $row['id'] . "'>
                            <button type='submit' name='approve' class='approve'>Approve</button>
                            <button type='submit' name='reject' class='reject'>Reject</button>
                        </form>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No pending stock requests.";
    }

    // Process the approval or rejection of stock requests
    if (isset($_POST['approve']) || isset($_POST['reject'])) {
        $requestId = $_POST['request_id'];
        $status = isset($_POST['approve']) ? 'approved' : 'rejected';

        // Update the status of the stock request
        $updateSql = "UPDATE stock_requests SET status = '$status' WHERE id = $requestId";
        if (mysqli_query($conn, $updateSql)) {
            echo "<p>Stock request " . $status . " successfully.</p>";

            // If the request is approved, insert it into the stock_approved table
            if ($status === "approved") {
                $selectSql = "SELECT * FROM stock_requests WHERE id = $requestId";
                $selectResult = mysqli_query($conn, $selectSql);

                if (mysqli_num_rows($selectResult) > 0) {
                    $selectRow = mysqli_fetch_assoc($selectResult);

                    $stockItem = $selectRow['stock_item'];
                    $quantity = $selectRow['quantity'];
                    $defectDetails = $selectRow['defect_details'];

                    $insertSql = "INSERT INTO stock_approved (stock_item, quantity, defect_details) VALUES ('$stockItem', $quantity, '$defectDetails')";
                    if (mysqli_query($conn, $insertSql)) {
                        echo "";

                        // Delete the approved request from the stock_requests table
                        $deleteSql = "DELETE FROM stock_requests WHERE id = $requestId";
                        mysqli_query($conn, $deleteSql);
                    } else {
                        echo "<p>Error inserting data into stock_approved table: " . mysqli_error($conn) . "</p>";
                    }
                } else {
                    echo "";
                }
            } else {
                // If the request is rejected, delete it from the stock_requests table
                $deleteSql = "DELETE FROM stock_requests WHERE id = $requestId";
                if (mysqli_query($conn, $deleteSql)) {
                    echo "<p>Stock request rejected and removed from the table.</p>";
                } else {
                    echo "<p>Error deleting stock request: " . mysqli_error($conn) . "</p>";
                }
            }
            echo "<script>
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // Refresh the page after 2 seconds (2000 milliseconds)
                    </script>";

        }
        
         else {
            echo "<p>Error updating status: " . mysqli_error($conn) . "</p>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>

    </div>
   
</body>
</html>


