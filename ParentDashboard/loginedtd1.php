<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("php/config.php");

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("Select Error: " . mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    if ($row && $row['password'] === $password) {
        $_SESSION['valid'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['Women_id'] = $row['Women_id'];

       header("Location:landing.html");
        exit;
    } else {
        $error = "Wrong Username or Password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
<style>
    User
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins','sans-serif';
}
body{
    background: #e9bd0d;

}
.container{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 90vh;
}
.box{
    background-color: #fdfdfd;
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 20px;
    box-shadow: 0 0 128px 0 rgba(0, 0,0, 0.1),
                0 32px 64px -48px rgba(0, 0, 0, 0.5)
}
.form-box{
    width: 450px;
    margin: 0px 10px
}
.form-box header{
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid#e6e6e6;
    margin-bottom: 10px;
}
.form-box form .field{
    display: flex;
    margin-bottom: 10px;
    flex-direction: column;

}
.form-box form .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #f1b21e;
    outline: none;
}
.btn{
    height: 35px;
    background: black;
    border: 0;
    border-radius: 5px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    transition: all.3s;
    margin-top: 10px;
    padding: 0px 10px;
}
.btn:hover{
    opacity: 0.82;
}

.submit{
    width: 100%;
}
.link{
    margin-bottom: 15px;
}
.message{
    text-align: center;
    padding: 15px 0px;
    border: 1px solid #699053;
    border-radius: 5px;
    margin-bottom: 10px;
    color:red;

}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
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
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="field input">
                        <label for="Women_id">Women Id</label>
                        <input type="text" name="Women_id" id="Women_id" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Don't have an account? <a href="signup.php">Sign Up</a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
