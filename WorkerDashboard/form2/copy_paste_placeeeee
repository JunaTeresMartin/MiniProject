<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "paalan";

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Personal Details
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$dob = $_POST['DOB'];
$age = $_POST['Age'];
$aadhaar = $_POST['Aadhaar'];
$address = $_POST['Address'];
$city = $_POST['City'];
$postalCode = $_POST['PostalCode'];
$contactNumber = $_POST['Ph_num'];
$email = $_POST['Email'];

// Pregnancy Details
$deliveryDate = $_POST['delivery_date'];
$lmp = $_POST['lastMdate'];
$numPregnancies = $_POST['noOfPregnancies'];
$numLiveBirths = $_POST['liveN'];
$numMiscarriages = $_POST['missN'];
$currentWeight = $_POST['wt'];
$numAbortions = $_POST['abN'];

// Medical History
$existingConditions = $_POST['existing_conditions'];
$previousComplications = $_POST['previous_conditions'];
$currentMedications = $_POST['current_medications'];
$allergies = $_POST['Allergies'];
$bloodType = $_POST['blood_type'];

// Insert into Personal Details table
$stmt1 = $conn->prepare("INSERT INTO women_personal_details (firstName, lastName, dob, age, aadharNo, address, city, pCode, contactNumber, emailAddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt1->bind_param("sssiissiis", $firstName, $lastName, $dob, $age, $aadhaar, $address, $city, $postalCode, $contactNumber, $email);
// $stmt1->execute();
if (!$stmt1->execute()) {
    die("Error in executing personal details query: " . mysqli_error($conn));
}

// Insert into Pregnancy Details table
$stmt2 = $conn->prepare("INSERT INTO women_pregnancy_details (expectedDeliveryDate, lmp, numberOfPregnancies, NumberOfLiveBirths, numberOfMiscarriages, numberOfAbortions,currentWeight ) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt2->bind_param("ssiii", $deliveryDate, $lmp, $numPregnancies, $numLiveBirths, $numMiscarriages, $numAbortions, $currentWeight);
$stmt2->execute();

// Insert into Medical History table
$stmt3 = $conn->prepare("INSERT INTO women_medical_history_details (existingMedicalConditions, previousPregnancyComplications, currentMedications, allergies, bloodType) VALUES (?, ?, ?, ?, ?)");
$stmt3->bind_param("sssss", $existingConditions, $previousComplications, $currentMedications, $allergies, $bloodType);
$stmt3->execute();

// Close the prepared statements and database connection
$stmt1->close();
$stmt2->close();
$stmt3->close();
$conn->close();

// Redirect to a success page or do further processing
// header("Location: success.php");
exit();
?>
