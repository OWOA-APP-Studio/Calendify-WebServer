<?php
    // Schedule Create SQL Query
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $uid = $_POST["id"];
        $sch_id = $_POST["sch_id"];
    
        $sql="DELETE FROM sch WHERE sch_mmb_uid='$uid' AND sch_id='$sch_id';";

        $result = mysqli_query($con,$sql);
        if($result) {
            $arr["success"] = "S";
        } else {
            $arr["success"] = "F";
        }
    } else {
        $arr["success"] = "Failed to connect to Server Error";
    }
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    mysqli_close($con);
?>