<?php   
    include('../dbcon.php');

    header("Content-Type: text/html; charset=UTF-8");
    $arr = array();
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $id= $_POST['id'];
        $password= hash('sha256', $_POST['password']);
        $email = $_POST['email'];
        $nickname = $_POST['nickname'];
        
        $info="INSERT INTO mmb_dt(mmb_uid, mmb_psw, mmb_eml, mmb_nck) VALUES ('$id','$password','$email','$nickname')";
        if(mysqli_query($con,$info)) {
            $arr["success"] = "1";
        } else {
            $arr["success"] = "-1";
        }
    }
    else {
        $arr["success"] = "Failed to connect to Server Error";
    }
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
?>