<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "paalan";

$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("connection error");
}

if (isset($_POST['submit'])) {
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

    $sql1 = "INSERT INTO `women_personal_details` (`firstName`, `lastName`, `dob`, `age`, `aadharNo`, `address`, `city`, `pCode`, `contactNumber`, `emailAddress`) 
        VALUES ('$firstName', '$lastName', '$dob', '$age', '$aadhaar', '$address', '$city', '$postalCode', '$contactNumber', '$email')";
    $result1 = mysqli_multi_query($data, $sql1);

    $sql2 = "INSERT INTO `women_pregnancy_details` (`expectedDeliveryDate`, `lmp`, `numberOfPregnancies`, `NumberOfLiveBirths`, `numberOfMiscarriages`, `numberOfAbortions`, `currentWeight`) 
        VALUES ('$deliveryDate', '$lmp', '$numPregnancies', '$numLiveBirths', '$numMiscarriages', '$numAbortions', '$currentWeight')";
    $result2 = mysqli_multi_query($data, $sql2);

    $sql3 = "INSERT INTO `women_medical_history_details` (`existingMedicalConditions`, `previousPregnancyComplications`, `currentMedications`, `allergies`, `bloodType`)
        VALUES ('$existingConditions', '$previousComplications', '$currentMedications', '$allergies', '$bloodType')";
    $result3 = mysqli_query($data, $sql3);

    if ($result1 && $result2 && $result3) {
        header("Location:form2.html");
    } else {
        echo "failed";
    }
}
?>
