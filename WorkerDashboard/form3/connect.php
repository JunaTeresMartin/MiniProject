<?php

$con=new mysqli('localhost','root','','paalan');

if(!$con){
    die(mysqli_errno(($con)));
}

?>