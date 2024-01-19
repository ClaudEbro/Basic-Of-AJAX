<?php
    include("connection.php");

    $id = $_POST['userid'];

    $fecth_query = mysqli_query($connection, "select * from employee where id ='$id'");

    $row = mysqli_num_rows($fecth_query);

    if($row > 0){
        $res = mysqli_fetch_array($fecth_query);
        echo json_encode($res);
    }