<?php
    // Schedule Create SQL Query
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $uid = $_POST["id"];
        $target_uid = $_POST["target_uid"];
    
        $sql="DELETE FROM frd WHERE (req_uid='$uid' AND tg_uid='$target_uid') OR (tg_uid='$uid' AND req_uid='$target_uid');";

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