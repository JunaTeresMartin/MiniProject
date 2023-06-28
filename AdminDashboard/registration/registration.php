<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    
    <div class="container">
        <div class="box form-box">
        
        <?php
         include("php/config.php");
         if(isset($_POST['submit'])){ // click submit
            $username = $_POST['username'];
            $email = $_POST['email'];
            $panchayath = $_POST['panchayath'];
            $password = $_POST['password'];  

            // check if email is unique
            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
            if(mysqli_num_rows($verify_query)!=0){
                echo "<div class='message'>
                           <p>This email is already used. Please try another one.</p>
                      </div><br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            } else {
                mysqli_query($con,"INSERT INTO users(Username, Email, Panchayath, PASSWORD) VALUES('$username','$email','$panchayath','$password')") or die("Error Occurred");
                echo "<div class='message'>
                           <p>Registration Successful</p>
                      </div><br>";
                echo "<a href='login.php'><button class='btn'>Login</button></a>";
            }
         } else {
    ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="panchayath">Panchayath</label>
                    <input type="text" name="panchayath" id="panchayath" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already have an account? <a href="login.html">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?> 
    </div>
</body>
</html>
