<?php
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    $uid = $_POST["id"];

    $sql="SELECT * FROM ctg WHERE ctg_mmb_uid = '$uid' ORDER BY ctg_id";
    $result=mysqli_query($con,$sql);
    $data=array();
    if($result){
        while($row=mysqli_fetch_array($result)){
            extract($row);

            array_push($data,
            array('ctg_mmb_uid' => $ctg_mmb_uid,
            'ctg_nm' => $ctg_nm,
            'ctg_dsc' => $ctg_dsc,
            'ctg_clr' => $ctg_clr
        ));}

        header('Content-Type: application/json; charset=utf8');
        echo json_encode(array("카테고리"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    }
    else{
        echo mysqli_error($con);
    }

    mysqli_close($con);
?>