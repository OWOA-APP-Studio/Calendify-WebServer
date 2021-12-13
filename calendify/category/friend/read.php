<?php
    include('../../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    $uid = $_POST["id"];
    $target_uid = $_POST["target_uid"];

    $target_sql ="SELECT * FROM ctg WHERE ctg_mmb_uid = '$target_uid' ORDER BY ctg_id";

    $data=array();

    $target_result = mysqli_query($con, $target_sql);

    if($target_result) {
        while($row=mysqli_fetch_array($target_result)) {
            extract($row);
 
            $share_category_sql = "SELECT * FROM fdc_shr_ctg WHERE frd_ctg_id ='$ctg_id'";
            $share_category_result = mysqli_query($con, $share_category_sql);

            if($share_category_result) 
                array_push($data,
                array('ctg_mmb_uid' => $ctg_mmb_uid,
                'ctg_nm' => $ctg_nm,
                'ctg_dsc' => $ctg_dsc,
                'ctg_clr' => $ctg_clr));
        }
        header('Content-Type: application/json; charset=utf8');
        echo json_encode(array("친구 카테고리"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    }
    else {
        echo mysqli_error($con);
    }
    mysqli_close($con);
?>