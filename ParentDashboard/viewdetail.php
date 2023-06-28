<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with the actual login page URL
    exit;
}

// Get the logged-in username from the session
$username = $_SESSION['username'];

// Include the database configuration file
include("php/config.php");

// Retrieve the Women ID from the user table
$query = "SELECT woman_id FROM users WHERE username = '$username'";
$result = mysqli_query($con, $query);

if ($row = mysqli_fetch_assoc($result)) {
    // Set the 'Women_id' key in the $_SESSION array
    $_SESSION['woman_id'] = $row['woman_id'];
} else {
    // Handle the case where the Women ID is not found
    // Redirect the user or display an error message
    header("Location: error.php"); // Replace 'error.php' with the appropriate error page URL
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>child Details</title>
  <style>
    
    /* CSS styles omitted for brevity */
    body {
      background-color:  #e9bd0d;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
   
    .worker-card {
      width: 400px;
      background-color:black;
      padding: 20px;
      border-radius: 10px;
      margin: 20px auto;
      text-align: center;
      color: white;
      
    }
    
    .worker-card h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }
    
    .worker-card p {
      font-size: 18px;
      margin-bottom: 8px;
    }
    
    .btn {
      display: inline-block;
      background-color:  #e9bd0d;
      background-color:;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 10px;
    }
  </style>
  
</head>

<body>
  <!--div class="navbar">
    <h1>Stock Analysis</h1>
  </div-->

  <!--div class="sidebar">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Stocks</a></li>
      <li><a href="#">Orders</a></li>
    </ul>
  </div-->

  <div class="worker-card">
    <?php
    // Retrieve the worker details based on the provided ID
    $woman_id = $_SESSION['woman_id'];
    $query = "SELECT * FROM child_details WHERE woman_id = '$woman_id'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
      // Display the worker details
      echo "<h1>Child Details</h1>";

      echo "<p><strong>Name:</strong> " . $row['child_name'] . "</p>";
      echo "<p><strong>Age:</strong> " . $row['child_age'] . "</p>";
      echo "<p><strong>height:</strong> " . $row['height'] . "</p>";
      echo "<p><strong>weight:</strong> " . $row['weight'] . "</p>";
      //   echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
      //   echo "<p><strong>Education Qualification:</strong> " . $row['education'] . "</p>";
      //   echo "<p><strong>Score:</strong> " . $row['score'] . "</p>";
      //   echo "<p><strong>Panchayath:</strong> " . $row['panchayath'] . "</p>";
    } else {
      echo "<p>Worker not found.</p>";
    }

    mysqli_close($con);
    ?>

    <a href="javascript:history.back();" class="btn">Go Back</a>
  </div>
</body>

</html>
