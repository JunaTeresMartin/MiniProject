<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from women_personal_details where woman_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:women_update.php');    }
    else{
        die(mysqli_error($con));
    }
}
?>