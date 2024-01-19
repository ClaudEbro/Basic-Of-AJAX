<?php
    include("connection.php");

    $id = $_POST['id'];

    $fetch_data = mysqli_query($connection, "select * from employee where id = '$id'");
    $row = mysqli_num_rows($fetch_data);

    if($row > 0 ){
        while($row = mysqli_fetch_assoc($fetch_data)){
        $data = $row; 
        }
    }
    echo json_encode($data);
?>