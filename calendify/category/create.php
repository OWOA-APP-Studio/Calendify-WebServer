<?php   
    include('../dbcon.php');

    header("Content-Type: text/html; charset=UTF-8");
    $arr = array();
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $color = $_POST['color'];

        $sql = "INSERT INTO ctg(ctg_mmb_uid, ctg_nm, ctg_dsc, ctg_clr) 
                VALUES ('$id','$name','$description', '$color')";
        
        if(mysqli_query($con,$sql)) {
            $arr["result"] = "S"; // success
        } else {
            $arr["result"] = mysqli_error($con); // failed
        }
    }
    else {
        $arr["result"] = mysqli_error($con);
    }
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
?>