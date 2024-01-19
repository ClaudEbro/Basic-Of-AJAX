<?php
    include("connection.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $insert_query = mysqli_query($connection,
    "insert into tbl_student set name='$name', email='$email', gender='$gender'");

    if(($insert_query) > 0){
        echo "Data inserted successfully.";
    }
    else{
        echo "Error !";
    }
?>