<?php
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    $uid = $_POST["id"];
    $category = $_POST["category"];
    $target_uid = $_POST["target_uid"];

    $ctg_id_sql = "SELECT ctg_id FROM ctg WHERE ctg_mmb_uid = '$uid' AND ctg_nm = '$category'";
    $ctg_id_result = mysqli_query($con, $ctg_id_sql);

    $data=array();

    if($ctg_id_result) {
        while($row2=mysqli_fetch_array($ctg_id_result)) {
            extract($row2);

            $sql = "SELECT * FROM fdc_shr_ctg WHERE frd_req_uid = '$target_uid' AND frd_ctg_id = '$ctg_id'";
            $result = mysqli_query($con, $sql);

            if($result) {
                while($row=mysqli_fetch_array($result)) {
                    extract($row);
        
                    array_push($data,
                    array('frd_req_uid' => $frd_req_uid,
                    'frd_ctg_id' => $frd_ctg_id));
                }
                header('Content-Type: application/json; charset=utf8');
                echo json_encode(array("공유 카테고리 목록"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
            }
            else {
                echo mysqli_error($con);
            }
        }
    }

    mysqli_close($con);
?>
