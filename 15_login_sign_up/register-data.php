<?php
    require_once("connection.php");

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $pwd = md5(mysqli_real_escape_string($conn, $_POST['pwd']));
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $insert_query = mysqli_query($conn, "insert into tbl_registration set name='$name', emailid='$email', password='$pwd', gender ='$gender'");

    if($insert_query > 0){
        echo "Registration Successful !";
    }else{
        echo "Error !";
    }
?>