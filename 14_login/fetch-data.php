<?php
    require_once("connection.php");

    $email = mysqli_real_escape_string($connection, $_POST['emailid']);
    $pwd = md5(mysqli_real_escape_string($connection, $_POST['pwd']));

    $select_query = mysqli_query($connection, "select * from tbi_user where emailid='$email' and password='$pwd' and status = 1");

    $row = mysqli_num_rows($select_query);

    if($row > 0){
        echo "Login Successful !";
    }else{
        echo "Wrong Credentials !";
    }
?>