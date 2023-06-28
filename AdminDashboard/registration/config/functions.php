<?php
require_once 'imp.php';
function display_data(){
    global $con;
    $query = "SELECT * FROM worker_approval";
    $result = mysqli_query($con,$query);
    return $result;
}
?>