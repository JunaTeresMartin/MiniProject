<?php
require_once 'imp.php';
function display_data(){
    global $con;
    $query = "SELECT * FROM child_details";
    $result = mysqli_query($con,$query);
    return $result;
}
?>