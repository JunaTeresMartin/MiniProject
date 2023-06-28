<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        .chart-container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 70px;
            box-sizing:box;
        }

        .chart-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .chart-bar {
            display: flex;
            align-items: flex-end;
            height: 300px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            padding: 10px;
            box-sizing: border-box;
        }

        .chart-bar-column {
            flex-grow: 1;
            margin-right: 10px;
            background-color: #2196F3;
            color: #fff;
            text-align: center;
            transition: height 0.3s ease;
        }

        .chart-bar-column:hover {
            background-color: #1565C0;
        }

        .chart-label {
            margin-top: 5px;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
        }

        .chart-axis-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .chart-axis-label {
            font-size: 12px;
            font-weight: bold;
            position: absolute;
            left: -30px;
            transform: translate(-50%, -50%) rotate(-90deg);
            white-space: nowrap;
        }

        .x-axis-label {
            text-align: center;
            margin-top: 10px;
        }
        .y-axis-label {
            text-align: center;
    margin-left: 10px;
    transform: translate(-50%, -50%) rotate(-90deg);
    white-space: nowrap;
    font-size: 12px;
    font-weight: bold;
    position: absolute;
    left: -30px;
    top: 50%;

        }
        .logo{
	margin: 0px;
	margin-left: 28px;
    font-weight: 400px;
    font-size:20px;
    color: rgb(224, 183, 20);
    margin-bottom: 30px;
}
.logo span{
	color: #9c9c9c;
}
    </style>
</head>
<body>
<div class="navbar">
    <p class="logo"><span>Paa</span>lan</p>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="main.php">Home</a></li>
            
        </ul>
    </div>
    <div class="chart-container">
        <h2 class="chart-title">Quantity Consumed in a Month (Bar Graph)</h2>
        <div class="chart-bar">
            <?php
            // Create a database connection
            $conn = mysqli_connect("localhost", "root", "", "Stock");

            // Check if the connection is successful
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch the quantity consumed in a month
            $sql = "SELECT MONTH(consumption_date) AS month, SUM(quantity) AS total_quantity FROM stock_approved GROUP BY MONTH(consumption_date)";
            $result = mysqli_query($conn, $sql);

            // Prepare the data for visualization
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $month = $row['month'];
                $quantity = intval($row['total_quantity']);
                $data[$month] = $quantity;
            }

            // Close the database connection
            mysqli_close($conn);
            ?>

            <?php
            foreach ($data as $month => $quantity) {
                $barHeight = ($quantity / max($data)) * 100;
                echo '<div class="chart-bar-column" style="height: ' . $barHeight . '%">';
                echo '<span class="chart-label">' . $month . '</span>';
                echo '<span class="chart-label">' . $quantity . '</span>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="chart-axis-labels">
            <span class="y-axis-label">Quantity</span>
            <span class="x-axis-label">Month</span>
        </div>
    </div>
</body>
</html>


