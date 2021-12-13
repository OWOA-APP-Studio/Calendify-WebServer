<?php
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    $uid = $_POST["id"];

    $sql="SELECT * FROM frd WHERE (req_uid = '$uid' OR tg_uid = '$uid') AND slt_res = 1;";
    $result=mysqli_query($con,$sql);
    $data = array();
    if($result){
        while($row=mysqli_fetch_array($result)){
            extract($row);

            array_push($data,
            array('req_uid' => $req_uid,
            'tg_uid' => $tg_uid,
            'slt_dt' => $slt_dt
        ));}

        header('Content-Type: application/json; charset=utf8');
        echo json_encode(array("친구목록"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    }
        else{
            echo "SQL문 처리중 에러 발생 : ";
            echo mysqli_error($con);
    }

    mysqli_close($con);
?>