<?php
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    $targetUid = $_POST["tg_uid"];
    $selectResult = $_POST["slt_res"];

    $sql ="UPDATE frd SET slt_res = $selectResult WHERE tg_uid = '$targetUid'";

    $data=array();

    if(mysqli_query($con,$sql)) {
        $arr["result"] = "S"; // success
    } else {
        $arr["result"] = mysqli_error($con); // failed
    }
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    mysqli_close($con);
?>