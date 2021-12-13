<?php
    // Schedule Create SQL Query
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $uid = $_POST["id"];
        $tg_uid = $_POST["tg_uid"];
    
        $sql="INSERT INTO frd(req_uid, tg_uid) VALUES('$uid', '$tg_uid');";
        $sql2="SELECT mmb_uid FROM mmb_dt WHERE mmb_nck = $tg_uid";
        $result = mysqli_query($con,$sql);
        $errLog;
        
        if($result) {
            $arr["success"] = "S";
        }
        else {
            $errLog = mysqli_error($con);

            $get_tg_uid = mysqli_query($con, $sql2);
            
            $sql="INSERT INTO frd(req_uid, tg_uid) VALUES('$uid', '$get_tg_uid');";
            $result = mysqli_query($con, $sql);

            if($result) {
                $arr["success"] = "S";
            }
            else {
                $arr["success"] = $errLog;
            }
        }
    } else {
        $arr["success"] = "Failed to connect to Server Error";
    }
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    mysqli_close($con);
?>