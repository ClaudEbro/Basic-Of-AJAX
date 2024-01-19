<?php
    include("connection.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $language = $_POST['language_name'];

    $insert_query = mysqli_query($connection,
    "insert into tbl_language set name='$name', email='$email', language='$language'");

    if(($insert_query) > 0){
        echo "Data inserted successfully.";
    }
    else{
        echo "Error !";
    }
?>