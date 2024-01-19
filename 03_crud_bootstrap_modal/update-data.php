<?php
    include("connection.php");

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $update_query = mysqli_query($connection,
                                "update employee 
                                set name='$name', email='$email', phone='$phone', address='$address'
                                where id='$id'");

    if($update_query > 0 ){
        echo "Data updated !";
    }
    else {
        echo "Error !";
    }
?>