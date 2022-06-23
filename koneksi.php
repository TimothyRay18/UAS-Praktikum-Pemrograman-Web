<?php
    $con = mysqli_connect("localhost","root","","UAS");
    if(!$con){
        die("Error: ".mysqli_connect_error($con));
    }
?>