<!DOCTYPE html>
<html>
<head>
  <title>Anganwadi Worker Registration</title>
 <style>
   body {
  font-family: Arial, sans-serif;
  margin: 20px;
  /* background: linear-gradient(135deg, rgba(171, 205, 239, 0.8), rgba(233, 236, 239, 0.8)); */
   background: linear-gradient(135deg, rgba(84, 25, 25, 0.8), rgba(8, 8, 8, 0.8)), url("bg.jpg"); 
  background-size: cover;
  background-position: center;
}

h1 {
  text-align: center;
  color: #efecec;
}

form {
  width: 500px;
  margin: 0 auto;
  background-color: rgba(255, 255, 255, 0.7);
  backdrop-filter: blur(10px);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  background-image: url("form-background.jpg");
  background-size: cover;
}

label {
  display: block;
  margin-top: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea,
input[type="tel"],
input[type="email"] {
  width: 90%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  background-color: rgba(255, 255, 255, 0.9);
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  background-color: rgba(215, 202, 19, 0.8);
  color: #0b0a0a;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  animation: button-animation 0.3s ease-in-out;
}

@keyframes button-animation {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}

input[type="submit"]:hover {
  background-color: rgba(14, 15, 14, 0.8);
  color: #fff;
}

.error-message {
  color: red;
  margin-top: 5px;
}
.go-back-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: transform 0.3s ease-in-out;
}

.go-back-button:hover {
  transform: scale(1.1);
}
</style>
</head>
<body>

<?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the form data
        $name = $_POST["name"];
        $age = $_POST["age"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $education = $_POST["education"];
        $score = $_POST["score"];
        $panchayath	 = $_POST["panchayath"];

        // Create a database connection
        $conn = mysqli_connect("localhost", "root", "", "Paalan");

        // Check if the connection is successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare the SQL statement to insert data into the database
        $sql = "INSERT INTO worker_registration (name, age, address, phone, email, education, score, 	panchayath)
        VALUES ('$name', '$age', '$address', '$phone', '$email', '$education', '$score', '$panchayath')";

        // Execute the SQL statement
        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
<a href="#" class="go-back-button">Go Back</a>

<h1>Worker Registration</h1>

<form id="registrationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="age">Age:</label>
  <input type="number" id="age" name="age" required>

  <label for="address">Address:</label>
  <textarea id="address" name="address" required></textarea>

  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="education">Education Qualification:</label>
  <input type="text" id="education" name="education" required>

  <label for="score">Test Score:</label>
  <input type="number" id="score" name="score" required>

  <label for="panchayath">panchayath:</label>
  <input type="text" id="	panchayath" name="panchayath" required>
  

  <br>
  <br>
  <input type="submit" value="Submit">
</form>

<script>
  document.getElementById("registrationForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Get form values
    var name = document.getElementById("name").value;
    var age = document.getElementById("age").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var education = document.getElementById("education").value;
    var score = document.getElementById("score").value;
    var panchayath = document.getElementById("panchayath").value;

    // Perform form validation and submission
    if (name && age && address && phone && email && education && score && panchayath) {
      // Form is valid, do something with the data (e.g., submit to server)
      console.log("Registration successful!");
      console.log("Name: " + name);
      console.log("Age: " + age);
      console.log("Address: " + address);
      console.log("Phone: " + phone);
      console.log("Email: " + email);
      console.log("Education: " + education);
      console.log("Score: " + score);
      console.log("panchayath	: " + panchayath);
     
      // Clear form fields
      document.getElementById("registrationForm").reset();
    } else {
      // Form is incomplete, display an error message
      alert("Please fill in all fields.");
    }
 
