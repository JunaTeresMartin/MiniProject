<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Worker Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
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

    .worker-card {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    .worker-card h1 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .worker-card p {
      margin: 10px 0;
    }

    .worker-card p strong {
      font-weight: bold;
    }

    .worker-card p:last-child {
      margin-bottom: 0;
    }

    .worker-card a {
      display: block;
      text-align: center;
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: transform 0.3s ease-in-out;
      margin-top: 20px;
    }

    .worker-card a:hover {
      transform: scale(1.1);
    }
  </style>
</head>

<body>
<div class="navbar">
        <h1>Stock Analysis</h1>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Stocks</a></li>
            <li><a href="#">Orders</a></li>
        </ul>
    </div>
  <div class="worker-card">
    <?php
    include("config/imp.php");

    // Retrieve the worker details based on the provided ID
    $workerId = $_GET['id'];
    $query = "SELECT * FROM worker_registration WHERE id = $workerId";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
      // Display the worker details
      echo "<h1>Worker Details</h1>";
      echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
      echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";
      echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
      echo "<p><strong>Phone:</strong> " . $row['phone'] . "</p>";
      echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
      echo "<p><strong>Education Qualification:</strong> " . $row['education'] . "</p>";
      echo "<p><strong>Score:</strong> " . $row['score'] . "</p>";
      echo "<p><strong>Panchayath:</strong> " . $row['panchayath'] . "</p>";
    } else {
      echo "<p>Worker not found.</p>";
    }

    mysqli_close($con);
    ?>

    <a href="javascript:history.back();" class="btn">Go Back</a>
  </div>
</body>

</html>
