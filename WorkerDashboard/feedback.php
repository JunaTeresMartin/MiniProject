<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paalan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn == false) {
    die("connection error");
}


if (isset($_POST['submit'])){
        $q1=$_POST['q1'];
        $q2=$_POST['q2'];
        $q3=$_POST['q3'];
        $q4=$_POST['q4'];
        $q5=$_POST['q5'];
        $comments=$_POST['comments'];

        $sql = "INSERT INTO feedback VALUES('$q1','$q2','$q3','$q4','$q5','$comments')";
             
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:thank_you.html");
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Paalan Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e9bd0d;
        }
        
        .form-container {
            width: 850px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .question p {
            margin: 0;
            font-size: 16px;
        }
        
        .radio-buttons {
            display: flex;
            justify-content: space-between;
        }
        
        .submit-btn {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Paalan Feedback</h2>
            <form action="" method="post">
                <div class="form-group question">
                    <p>1. How would you rate the overall user interface of Paalan?(0 - Poor, 5 - Excellent)</p>
                    <div class="radio-buttons">
                        <label><input type="radio" name="q1" value="0" required> 0</label>
                        <label><input type="radio" name="q1" value="1" required> 1</label>
                        <label><input type="radio" name="q1" value="2" required> 2</label>
                        <label><input type="radio" name="q1" value="3" required> 3</label>
                        <label><input type="radio" name="q1" value="4" required> 4</label>
                        <label><input type="radio" name="q1" value="5" required> 5</label>
                    </div>
                </div>
                
                <div class="form-group question">
                    <p>2. How easy was it to navigate through the different features and sections of Paalan?(0 - Poor, 5 - Excellent)</p>
                    <div class="radio-buttons">
                        <label><input type="radio" name="q2" value="0" required> 0</label>
                        <label><input type="radio" name="q2" value="1" required> 1</label>
                        <label><input type="radio" name="q2" value="2" required> 2</label>
                        <label><input type="radio" name="q2" value="3" required> 3</label>
                        <label><input type="radio" name="q2" value="4" required> 4</label>
                        <label><input type="radio" name="q2" value="5" required> 5</label>
                    </div>
                </div>
                
                <div class="form-group question">
                    <p>3. Did the design and layout of Paalan enhance your user experience?(0 - Poor, 5 - Excellent)</p>
                    <div class="radio-buttons">
                        <label><input type="radio" name="q3" value="0" required> 0</label>
                        <label><input type="radio" name="q3" value="1" required> 1</label>
                        <label><input type="radio" name="q3" value="2" required> 2</label>
                        <label><input type="radio" name="q3" value="3" required> 3</label>
                        <label><input type="radio" name="q3" value="4" required> 4</label>
                        <label><input type="radio" name="q3" value="5" required> 5</label>
                    </div>
                </div>
                
                <div class="form-group question">
                    <p>4. How satisfied are you with the responsiveness and speed of Paalan's user interface?(0 - Poor, 5 - Excellent)</p>
                    <div class="radio-buttons">
                        <label><input type="radio" name="q4" value="0" required> 0</label>
                        <label><input type="radio" name="q4" value="1" required> 1</label>
                        <label><input type="radio" name="q4" value="2" required> 2</label>
                        <label><input type="radio" name="q4" value="3" required> 3</label>
                        <label><input type="radio" name="q4" value="4" required> 4</label>
                        <label><input type="radio" name="q4" value="5" required> 5</label>
                    </div>
                </div>
                
                <div class="form-group question">
                    <p>5. To what extent did Paalan meet your expectations in terms of user interface and usability?(0 - Poor, 5 - Excellent)</p>
                    <div class="radio-buttons">
                        <label><input type="radio" name="q5" value="0" required> 0</label>
                        <label><input type="radio" name="q5" value="1" required> 1</label>
                        <label><input type="radio" name="q5" value="2" required> 2</label>
                        <label><input type="radio" name="q5" value="3" required> 3</label>
                        <label><input type="radio" name="q5" value="4" required> 4</label>
                        <label><input type="radio" name="q5" value="5" required> 5</label>
                    </div>
                </div>
                
                <div class="form-group question">
                    <p>Additional Comments:</p>
                    <textarea name="comments" rows="4" cols="97"></textarea>
                </div>
                
                <div class="submit-btn">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
