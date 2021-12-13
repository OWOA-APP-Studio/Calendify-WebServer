<?php
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    $uid = $_POST["id"];

    $sql = "SELECT * FROM frd WHERE tg_uid = '$uid' AND slt_res = 0 ORDER BY slt_dt";

    $data=array();
    $result = mysqli_query($con, $sql);

    if($result) {
        while($row=mysqli_fetch_array($result)) {
            extract($row);
                array_push($data,
                array('req_uid' => $req_uid,
                'tg_uid' => $tg_uid,
                'slt_res' => $slt_res,
                'slt_dt' => $slt_dt));
        }
        header('Content-Type: application/json; charset=utf8');
        echo json_encode(array("친구 요청 목록"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    }
    else {
        echo mysqli_error($con);
    }
    mysqli_close($con);
?>
