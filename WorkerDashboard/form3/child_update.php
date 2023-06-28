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
      <a href="../form1/form1.html" class="text-light">ADD NEW</a>
    </button>
    <table class="table table-striped table-dark table-hover">
      <thead class="table-primary">
        <tr>
          <th scope="col">Id no:</th>
          <th scope="col">Name</th>
          <th scope="col">Age</th>
          <th scope="col">Date of birth</th>
          <th scope="col">Mother Id</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "select * from child_details";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['child_id'];
            $child_name = $row['child_name'];
            $child_age = $row['child_age'];
            $child_dob = $row['child_dob'];
            $woman_id = $row['woman_id'];
            echo '
                <tr>
                  <th scope="row">' . $id . '</th>
                  <td>' . $child_name . '</td>
                  <td>' . $child_age . '</td>
                  <td>' . $child_dob . '</td>
                  <td>' . $woman_id . '</td>
                  <td>
                    <button class="btn btn-primary"><a href="update_button_child.php? childupdateid=' . $id . '"  class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete_btn_child.php? childdeleteid=' . $id . '" class="text-light" onclick="return confirmDelete();">Delete</a></button>
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