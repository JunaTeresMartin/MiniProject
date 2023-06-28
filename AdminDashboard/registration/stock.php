<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Approval</title>
    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the form data
        $stock_item = $_POST['stock_item'];
        $quantity = $_POST['quantity'];
        $defect_details = $_POST['defect_details'];
        
        // Create a database connection
        $conn = mysqli_connect("localhost", "root", "", "Stock");

        // Check if the connection is successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare the SQL statement to insert data into the database
        $sql = "INSERT INTO stock_requests (stock_item, quantity, defect_details)
                VALUES ('$stock_item', $quantity, '$defect_details')";

        // Execute the SQL statement
        if (mysqli_query($conn, $sql)) {
            header("Location: thankyou.html");
            echo "Stock request placed successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

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
    
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
    
        label {
            display: block;
            margin-bottom: 10px;
        }
    
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
    
        textarea {
            height: 80px;
        }
    
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #e5bf16;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
        }
        a{
            text-decoration:none;
            color: #ffffff;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            font-size: 14px;
            color: #333;
        }

        select option {
            background-color: #fff;
            color: #333;
        }

        select option:hover {
            background-color: #f5f5f5;
        }

        select:focus {
            outline: none;
            box-shadow: 0 0 5px #ddd;
        }
        .logo{
	margin: 0px;
	margin-left: 28px;
    font-weight: bold;
    color: rgb(224, 183, 20);
    margin-bottom: 30px;
}
.logo span{
	color: #9c9c9c;
}
    </style>
    <script>
        // Function to toggle the visibility of the defect details input field
        function toggleDefectDetails() {
            var defectQuestion = document.getElementById("defect_question");
            var defectDetails = document.getElementById("defect_details");

            if (defectQuestion.value === "Yes") {
                defectDetails.style.display = "block";
            } else {
                defectDetails.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <div class="navbar">
    
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="main.php">Home</a></li>
            
        </ul>
    </div>

    <div class="main-content">
    <p class="logo"><span>Paa</span>lan</p>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="stock_item">Stock Item:</label>
            <input type="text" id="stock_item" name="stock_item" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <label for="defect_question">Is there any defect?</label>
            <select id="defect_question" name="defect_question" onchange="toggleDefectDetails()">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>

            <div id="defect_details" style="display: none;">
                <label for="defect_details">Defect Details:</label>
                <textarea id="defect_details" name="defect_details"></textarea>
            </div>

            <button type="submit">Order Placed</button>
        </form>
    </div>
</body>
</html>