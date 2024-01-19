<?php
    require_once("connection.php");

    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $pwd = md5(mysqli_real_escape_string($conn, $_POST['pwd']));

    $fetch_data = mysqli_query($conn, "select * from tbl_registration where emailid='$email'and password='$pwd'");

    $row = mysqli_num_rows($fetch_data);
    if($row > 0){
        echo "Login Successful !";
    }else{
        echo "Wrobg Credentials !";
    }
?>