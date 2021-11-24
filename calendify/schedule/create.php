<?php
    // Schedule Create SQL Query
    include('../dbcon.php');
    header("Content-Type: text/html; charset=UTF-8");

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $uid = $_POST["id"];
        $sch_ttl = $_POST["sch_ttl"];   // Title
        $sch_dsc = $_POST["sch_dsc"];   // Description
        $sch_ctg = $_POST["sch_ctg"];   // Category
        $sch_lct = $_POST["sch_lct"];   // Location
        $sch_stm = $_POST["sch_stm"];   // Start Time
        $sch_etm = $_POST["sch_etm"];   // End Time
        $sch_sdy = $_POST["sch_sdy"];   // Start Day : Default current timestamp
        $sch_edy = $_POST["sch_edy"];   // End Day : Nullable
        $sch_slc_alr = $_POST["sch_slc_alr"];   // Schedule Select Alarm : 1:True, -1:False
        $sch_slc_typ = $_POST["sch_slc_typ"];   // Schedule Select Type : 'Y':Year, 'M':Month, "W':Weekend, 'D':Day
    
        $sql="INSERT INTO sch(sch_mmb_uid, sch_ttl, sch_dsc, sch_ctg, sch_lct, sch_stm, sch_etm, sch_sdy, sch_edy, sch_slc_alr, sch_slc_typ)
        VALUES('$uid', '$sch_ttl', '$sch_dsc', '$sch_ctg', '$sch_lct', '$sch_stm', '$sch_etm', '$sch_sdy', '$sch_edy', $sch_slc_alr,'$sch_slc_typ');";

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