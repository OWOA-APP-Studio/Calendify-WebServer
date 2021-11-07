<?php
    include('../dbcon.php');

    header("Content-Type: text/html; charset=UTF-8");
    $arr = array();
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $id= $_POST['id'];
        
        $sql="SELECT mmb_uid FROM mmb_dt WHERE mmb_uid='$id'";
        if(mysqli_fetch_array(mysqli_query($con,$sql))) {
            $arr["success"] = "1";
        } else {
            $arr["success"] = "-1";
        }
    }
    else {
        $arr["success"] = "Failed to connect to Server Error";
    }
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
?>