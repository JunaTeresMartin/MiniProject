<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("../WorkerDashboard/form3/connect.php");

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM worker_credentials WHERE username='$username'") or die("Select Error: " . mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    if ($row && $row['password'] === $password) {
        $_SESSION['valid'] = $row['username'];
        $_SESSION['username'] = $row['Username'];

        header("Location: index.html");
        exit;
    } else {
        $error = "Wrong Username or Password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <a href="../LandingPage/index1.html"><img src="icon.jpg" alt="PAALAN Icon" style="width: 24px; height: 24px; position: absolute; top: 10px; left: 10px;"></a>

    <div class="container">
        <div class="box form-box">
            <?php if (isset($error)) : ?>
                <div class='message'>
                    <p><?php echo $error; ?></p>
                </div><br>
                <a href='login.php'><button class='btn'>Go Back</button></a>
            <?php else : ?>
                <header>Login</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <!-- <div class="links">
                        Don't have an account? <a href="registration.php">Sign Up</a>
                    </div> -->
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
