<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "paalan";

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn == false) {
    die("connection error");
}


// Process the form data when the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $child_name = $_POST['childName'];
    $mother_id = $_POST['mother_id'];
    $child_age = $_POST['childAge'];
    $child_dob = $_POST['childDOB'];
    $child_mp = $_POST['childMP'];
    $child_blockNumber = $_POST['childBlockNo'];
    $child_city = $_POST['childCity'];
    $child_district = $_POST['childDistrict'];
    $father_name = $_POST['childFName'];
    $father_occupation = $_POST['childFO'];
    $mother_name = $_POST['childMName'];
    $mother_occupation = $_POST['childMO'];
    $no_of_family_members = $_POST['familyMembersNo'];
    $annual_income = $_POST['annualIncome'];
    // $if_child_medical_issues = $_POST['contact'];
    $medical_issue_details = $_POST['medical_issue_details'];
    $child_guardian_phone_no = $_POST['Guardian_no'];

    // SQL query to insert the form data into the table
    $sql = "INSERT INTO child_details (woman_id, child_name, child_age, child_dob, child_mp, child_blockNumber, child_city, child_district, father_name, father_occupation,mother_name,mother_occupation,no_of_family_members,annual_income,medical_issue_details,child_guardian_phone_no )
            VALUES ('$mother_id','$child_name', '$child_age', '$child_dob', '$child_mp', '$child_blockNumber', '$child_city', '$child_district', '$father_name', '$father_occupation','$mother_name','$mother_occupation','$no_of_family_members','$annual_income','$medical_issue_details','$child_guardian_phone_no')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:form1.html");
    } 
    else {
        echo "failed";
    }
}

// Close the database connection
mysqli_close($conn);
?>


