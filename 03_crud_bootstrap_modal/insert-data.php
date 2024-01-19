<?php
    include("connection.php");

    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $insert_query = mysqli_query($connection,
                                "insert into employee 
                                set name='$name', email='$email', phone='$phone', address='$address'");

    if($insert_query > 0 ){
        echo "Data submitted successfully !";
    }
    else {
        echo "Error !";
    }
?>