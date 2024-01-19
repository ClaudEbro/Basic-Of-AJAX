<?php
    session_start();
    require_once("connection.php");

    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $pwd = md5(mysqli_real_escape_string($conn, $_POST['pwd']));

    $select_query = mysqli_query($conn, "select * from tbl_registration where emailid='$email' and password='$pwd'");

    $row = mysqli_num_rows($select_query);

    if($row > 0){
        $fetch_data = mysqli_fetch_assoc($select_query);
        $name = $fetch_data['name'];
        $_SESSION['name'] = $name;
        echo json_encode(array("status"=>1, "msg"=>"Login Successful !"));
    }else{
        echo json_encode(array("status"=>0, "msg"=>"Wrong Credentials !"));
    }
?>