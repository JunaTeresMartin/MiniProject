
<?php
require_once 'config/imp.php';
require_once 'config/function2.php';

// Check if the search parameter is present in the URL
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Retrieve data from the database and filter based on the search parameter
$result = display_data($search);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Pregnant Women Details</title>
    <style>
        body {
            background-color: rgb(224, 183, 20);
            color: black;
        }
        .sidebar {
        background-color: #333;
        color: #fff;
        padding: 20px;
        height: 100vh;
        }
        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar .logo img {
            width: 80px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            margin-bottom: 15px;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }
        .content {
            padding: 20px;
        }
        .navbar {
            background-color: #000;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        .navbar .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .navbar .navbar-nav .nav-link {
            color: #fff;
            text-decoration: none;
        }
        .container {
            margin-top: 80px;
        }
        .table {
            background-color: white;
            color: black;
        }
        .table thead th {
            background-color: black;
            color: yellow;
            border-color: black;
            padding: 10px;
            font-weight: bold;
            vertical-align: middle;
        }
        .table tbody td {
            border-color: black;
            padding: 10px;
        }
        .btn-primary {
            background-color: black;
            border-color: rgb(224, 183, 20);
        }
        .btn-primary:hover {
            background-color: rgb(192, 151, 16);
            border-color: rgb(192, 151, 16);
        }
        .btn-danger {
            background-color: rgb(224, 183, 20);
            border-color: rgb(224, 183, 20);
        }
        .btn-danger:hover {
            background-color: rgb(192, 151, 16);
            border-color: rgb(192, 151, 16);
        }
        
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                
                Pregnant Women Details
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="logo">
                    <img src="your-logo.png" alt="Logo">
                </div>
                <ul>
                    <li><a href="main.php">Dashboard</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="col-md-9 content">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form action="" method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by City" value="<?php echo $search; ?>">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Age</th>
                                            <th>City</th>
                                            <th>Pincode</th>
                                            
                                            <!-- <th>Edit</th>
                                            <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['firstName']; ?></td>
                                                <td><?php echo $row['lastName']; ?></td>
                                                <td><?php echo $row['age']; ?></td>
                                                <td><?php echo $row['city']; ?></td>
                                                <td><?php echo $row['pCode']; ?></td>
                                                
                                                <!-- <td><a href="#" class="btn btn-primary">Edit</a></td>
                                                <td><a href="#" class="btn btn-danger">Delete</a></td> -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-d6f5/2EnLdIYfqP1IWE3wq75T17yYED8MO4KEnX5bT63JfgIpq62mk1TsTZyS3HZ" crossorigin="anonymous"></script>
</body>
</html>
