<?php
include 'connect.php';
if(isset($_GET['childdeleteid'])){
    $id=$_GET['childdeleteid'];
    $sql="delete from child_details where child_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:child_update.php');    }
    else{
        die(mysqli_error($con));
    }
}
?>
