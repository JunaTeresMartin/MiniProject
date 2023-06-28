<?php
include 'connect.php';
$id=$_GET['childupdateid'];
$sql="select * from `child_details` where child_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$woman_id = $row['woman_id'];
$child_name = $row['child_name'];
$child_age = $row['child_age'];
$child_dob = $row['child_dob'];
$father_name = $row['father_name'];
$mother_name = $row['mother_name'];
$no_of_family_members = $row['no_of_family_members'];
$child_guardian_phone_no = $row['child_guardian_phone_no'];
$height = $row['height'];
$weight = $row['weight'];

if(isset($_POST['submit'])){
    $child_name = $_POST['childName'];
    $mother_id = $_POST['mother_id'];
    $child_age = $_POST['childAge'];
    $child_dob = $_POST['childDOB'];
    $father_name = $_POST['childFName'];
    $mother_name = $_POST['childMName'];
    $no_of_family_members = $_POST['familyMembersNo'];
    $child_guardian_phone_no = $_POST['Guardian_no'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $sql="update `child_details` 
          set child_id='$id',woman_id='$mother_id',child_name='$child_name',child_age='$child_age',child_dob='$child_dob',father_name='$father_name',mother_name='$mother_name',
          no_of_family_members='$no_of_family_members',child_guardian_phone_no='$child_guardian_phone_no',height='$height',weight='$weight'
          where child_id=$id";
    $result = mysqli_query($con, $sql);

    // new
    // Insert height value into Height_History table
    $height_sql = "INSERT INTO Height_History (child_id, child_name, height_value) VALUES ('$id','$child_name', '$height')";
    mysqli_query($con, $height_sql);

    // Insert weight value into Weight_History table
    $weight_sql = "INSERT INTO Weight_History (child_id, child_name, weight_value) VALUES ('$id','$child_name', '$weight')";
    mysqli_query($con, $weight_sql);


    //new
    




    if ($result) {
              header("Location:child_update.php");
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
        <h2 class="subheading">CHILD DETAILS</h2>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="form-container">
      <h2>Child Update Form</h2>
      
      <form method="POST" id="childUpdateForm">
        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="name">Mother id:</label>
              <input type="text" class="form-control" id="m_id" name="mother_id" placeholder="Enter Mother's id no"  value=<?php echo $woman_id;?>>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="name">Child Name:</label>
              <input type="text" class="form-control" id="name" name="childName" placeholder="Enter your name" value=<?php echo $child_name;?>>
            </div>
          </div>
        </div>
        <!-- second part -->
        <div class="form-row">
        <div class="col">
            <div class="form-group">
              <label for="age">Child Age:</label>
              <input type="number" class="form-control" id="age" name="childAge" placeholder="Enter your age" value=<?php echo $child_age;?>>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
              <label for="dob">Date of Birth:</label>
              <input type="date" class="form-control" id="dob" name="childDOB" value=<?php echo $child_dob;?>>
            </div>
        </div>
        </div>
        <!-- third part -->
        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="fatherName">Father's Name:</label>
              <input type="text" class="form-control" id="fatherName" name="childFName" placeholder="Enter your father's name" value=<?php echo $father_name;?>>
            </div>
          </div>
          <div class="col">
              <div class="form-group">
                <label for="motherName">Mother's Name:</label>
                <input type="text" class="form-control" id="motherName" name="childMName" placeholder="Enter your mother's name" value=<?php echo $mother_name;?>>
              </div>
            </div>
        </div>

        <!-- fourth part -->
        <div class="form-row">
              <div class="col">
                  <div class="form-group">
                      <label for="phone">Child Guardian Phone Number:</label>
                      <input type="tel" class="form-control" id="phone" name="Guardian_no" placeholder="Enter your phone number" value=<?php echo $no_of_family_members;?>>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="familyMembers">Number of Family Members:</label>
                      <input type="number" class="form-control" id="familyMembers" name="familyMembersNo" placeholder="Enter the number of family members" value=<?php echo $child_guardian_phone_no;?>>
                  </div>
              </div>
        </div>

          <!-- last part -->
          <div class="form-row">
          <div class="col">
              <div class="form-group">
                  <label for="height">Child Height:</label>
                  <input type="number" class="form-control" id="height" name="height" placeholder="Enter child height" required value=<?php echo $height;?>>
              </div>
          </div>
          <div class="col">
                <div class="form-group">
                    <label for="weight">Child weight:</label>
                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter child weight" required value=<?php echo $weight;?>>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>

        </div>
        
      </form>
    </div>
  </div>
</body>
</html>