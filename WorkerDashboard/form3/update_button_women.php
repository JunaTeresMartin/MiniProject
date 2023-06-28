<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from `women_personal_details` where woman_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$firstName=$row['firstName'];
$lastName=$row['lastName'];
$dob=$row['dob'];
$age=$row['age'];
$aadharNo=$row['aadharNo'];
$Address=$row['address'];
$city=$row['city'];
$code=$row['pCode'];
$number=$row['contactNumber'];
$email=$row['emailAddress'];

if(isset($_POST['submit'])){
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
    $is_delivered= $_POST['delivery_status'];
    $sql="update `women_personal_details` 
          set woman_id=$id,firstName='$firstName',lastName='$lastName',dob='$dob',age='$age',aadharNo='$aadhaar',
          address='$address',city='$city', pCode='$postalCode',contactNumber='$contactNumber',emailAddress='$email', delivered='$is_delivered'
          where woman_id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
              header("Location:women_update.php");
              exit();
    } 
    else {
            echo "failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- CSS -->
<style>
  body {
    margin: 0;
    padding: 0;
  }

  header {
    background-color: #f2f2f2; 
    padding: 20px;
  }

  .top-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 25px;
    color: #fff;
    font-family: Arial, sans-serif;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .site-name {
    display: flex;
    align-items: center;
  }

  .site-name h1 {
    font-size: 24px;
    margin-right: 10px;
  }

  .site-name h2 {
    font-size: 18px;
    font-weight: normal;
  }

  .form-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-container h2 {
    margin-bottom: 30px;
  }
</style>
</head>
<body>
  <header>
    <div class="top-section">
      <div class="site-name">
        <h1>PAALAN</h1>
        <h2 class="subheading">WOMEN DETAILS</h2>
      </div>
    </div>
  </header>
<div class="container">
    <div class="form-container">
      <h2>Women Update Form</h2>

      <form id="PregnantWomenRegistrationForm" method="POST">
        <!-- Personal Details -->
        <h4>Personal Details</h4>
        <div class="form-group">
          <label for="firstName">First Name:</label>
          <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" value=<?php echo $firstName;?>>
        </div>
        <div class="form-group">
          <label for="lastName">Last Name:</label>
          <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" value=<?php echo $lastName;?>>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input type="date" class="form-control" id="dob" name="DOB" value=<?php echo $dob;?>>
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" class="form-control" id="age" name="Age" placeholder="Enter your age" value=<?php echo $age;?>>
        </div>
        <div class="form-group">
          <label for="aadhaar">Aadhaar Number:</label>
          <input type="text" class="form-control" id="aadhaar" name="Aadhaar" placeholder="Enter your Aadhaar number" value=<?php echo $aadharNo;?>>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" name="Address" placeholder="Enter your address" value=<?php echo $Address;?>>
        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <input type="text" class="form-control" id="city" name="City" placeholder="Enter your city" value=<?php echo $city;?>>
        </div>
        <div class="form-group">
          <label for="postalCode">Postal Code:</label>
          <input type="text" class="form-control" id="postalCode" name="PostalCode" placeholder="Enter your postal code" value=<?php echo $code;?>>
        </div>
        <div class="form-group">
          <label for="contactNumber">Contact Number:</label>
          <input type="tel" class="form-control" id="contactNumber" name="Ph_num" placeholder="Enter your contact number" value=<?php echo $number;?>>
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" id="email" name="Email" placeholder="Enter your email address" value=<?php echo $email;?> required>
        </div>
        <div class="form-group">
            <label for="delivery_status">Delivered</label>
            <select class="form-control" name="delivery_status" id="delivery_status" >
              <option value="" selected disabled>Delivered:</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
        </div>
        
     <!-- Submit Button -->
     <button type="submit" class="btn btn-primary" name="submit">Update</button>

   </form>
  </div>
 </div>
</body>
</html>