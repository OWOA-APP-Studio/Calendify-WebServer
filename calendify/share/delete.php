<?php
    include('../dbcon.php');

    header("Content-Type: text/html; charset=UTF-8");
    $arr = array();
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $uid= $_POST['id'];
        $targetUid = $_POST["target_uid"];
        $category = $_POST["category"];

        $ctg_id_sql = "SELECT ctg_id FROM ctg WHERE ctg_mmb_uid = '$uid' AND ctg_nm = '$category'";
        $ctg_id_result = mysqli_query($con, $ctg_id_sql);

        if($ctg_id_result) {
            while($row2=mysqli_fetch_array($ctg_id_result)) {
                extract($row2);
                
                $sql="DELETE FROM fdc_shr_ctg WHERE frd_req_uid = '$targetUid' AND frd_ctg_id = $ctg_id";
                $result = mysqli_query($con, $sql);
                if($result) {
                    $arr["success"] = "S";
                } else {
                    $arr["success"] = mysqli_error($con);
                }
            }
        }
    }
    else {
        $arr["success"] = "Failed to connect to Server Error";
    }
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
?>