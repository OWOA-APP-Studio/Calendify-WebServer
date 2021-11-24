<?php
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    $uid = $_POST["id"];
    $category = $_POST["category"];

    $sql="SELECT * FROM sch WHERE sch_mmb_uid = '$uid' AND sch_ctg = '$category' ORDER BY sch_sdy, sch_stm";
    $result=mysqli_query($con,$sql);
    $data = array();
    if($result){
        while($row=mysqli_fetch_array($result)){
            extract($row);

            array_push($data,
            array('sch_mmb_uid' => $sch_mmb_uid,
            'sch_id' => $sch_id,
            'sch_ttl' => $sch_ttl,
            'sch_dsc' => $sch_dsc,
            'sch_ctg' => $sch_ctg,
            'sch_lct' => $sch_lct,
            'sch_stm' => $sch_stm,
            'sch_etm' => $sch_etm,
            'sch_sdy' => $sch_sdy,
            'sch_edy' => $sch_edy,
            'sch_slc_alr' => $sch_slc_alr,
            'sch_slc_typ' => $sch_slc_typ
        ));}

        header('Content-Type: application/json; charset=utf8');
        echo json_encode(array("일정"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    }
        else{
            echo "SQL문 처리중 에러 발생 : ";
            echo mysqli_error($con);
    }

    mysqli_close($con);
?>