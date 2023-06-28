<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    a.text-light {
      text-decoration: none;
    }
  </style>
  <script>
    function confirmDelete() {
      return confirm("Are you sure you want to delete this record?");
    }
  </script>
</head>

<body>
  <div class="container">
    <button class="btn btn-primary my-5">
      <a href="../form2/form2.html" class="text-light">ADD NEW</a>
    </button>
    <table class="table table-striped table-dark table-hover">
      <thead class="table-primary">
        <tr>
          <th scope="col">Id no:</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Age</th>
          <th scope="col">Aadhaar</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">Pin Code</th>
          <th scope="col">Contact Number</th>
          <th scope="col">Email Address</th>
          <th scope="col">Operations</th>
          <!-- <th scope="col">Delivered</th>
          <th scope="col">Delivery Date</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "select * from women_personal_details";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['woman_id'];
            $fName = $row['firstName'];
            $lName = $row['lastName'];
            $age = $row['age'];
            $aadharNo = $row['aadharNo'];
            $Address = $row['address'];
            $city = $row['city'];
            $code = $row['pCode'];
            $number = $row['contactNumber'];
            $email = $row['emailAddress'];
            echo '
                <tr>
                  <th scope="row">' . $id . '</th>
                  <td>' . $fName . '</td>
                  <td>' . $lName . '</td>
                  <td>' . $age . '</td>
                  <td>' . $aadharNo . '</td>
                  <td>' . $Address . '</td>
                  <td>' . $city . '</td>
                  <td>' . $code . '</td>
                  <td>' . $number . '</td>
                  <td>' . $email . '</td>
                  <td>
                    <button class="btn btn-primary"><a href="update_button_women.php? updateid=' . $id . '"  class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete_btn_women.php? deleteid=' . $id . '" class="text-light" onclick="return confirmDelete();">Delete</a></button>
                  </td>
                </tr>';
          }
        }


        ?>


      </tbody>
    </table>
  </div>

</body>

</html>