<?php
    include("connection.php");

    $id = $_POST['userid'];

    $delete_query = mysqli_query($connection, "delete from employee where id ='$id'");

    if($delete_query > 0){
        echo "Data deleted !";
    }
    else {
        echo "Error !";
    }