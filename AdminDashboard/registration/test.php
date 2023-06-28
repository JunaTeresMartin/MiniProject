<!DOCTYPE html>
<html>
<head>
  <title>Anganwadi Worker Approval</title>
  <style>
    /* CSS styles for the table and buttons */
  </style>
</head>
<body>
<?php
// Create the first database connection for worker_registration
$conn1 = mysqli_connect("localhost", "root", "", "registration");
if (!$conn1) {
    die("Connection to worker_registration database failed: " . mysqli_connect_error());
}

// Create the second database connection for workers
$conn2 = mysqli_connect("localhost", "root", "", "AganwadiWorker");
if (!$conn2) {
    die("Connection to workers database failed: " . mysqli_connect_error());
}

// Get the admin's panchayath from the session or wherever it's stored
$adminPanchayath = "Panchayath"; // Replace with actual admin's panchayath

// Retrieve the admin's details from the users table in Registration database
$adminQuery = "SELECT * FROM registration.users WHERE name username = 'admin' LIMIT 1";
$adminResult = mysqli_query($conn1, $adminQuery);

if (mysqli_num_rows($adminResult) > 0) {
    $adminRow = mysqli_fetch_assoc($adminResult);
    $adminName = $adminRow['name'];
    $adminEmail = $adminRow['email'];
}

// Process approval
// if (isset($_GET['approve'])) {
//     // ... rest of the code remains unchanged ...
// }

// // Process rejection
// if (isset($_GET['reject'])) {
//     // ... rest of the code remains unchanged ...
// }

// Retrieve worker details for the approval table based on admin's panchayath from workers database
$approvalQuery = "SELECT id, name, score FROM workers.AganwadiWorker WHERE panchayath = '$adminPanchayath' ORDER BY score DESC";
$approvalResult = mysqli_query($conn2, $approvalQuery);
?>

<!-- Display the admin's name and email -->
<h2>Admin Details</h2>
<p>Name: <?php echo $adminName; ?></p>
<p>Email: <?php echo $adminEmail; ?></p>

<!-- Display the approval table -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Score</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($approvalResult)): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['score']; ?></td>
        <td>
          <a href="?approve=<?php echo $row['id']; ?>">Approve</a>
          <a href="?reject=<?php echo $row['id']; ?>">Reject</a>
          <a href="?view=<?php echo $row['id']; ?>">View Details</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php
// ... rest of the code remains unchanged ...
?>

</body>
</html>

