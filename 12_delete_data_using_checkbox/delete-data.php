<?php
    include("connection.php");

    $delete_id = $_POST['dlt_id'];
    $delete_id = implode($delete_id, ",");

    $delete_query = mysqli_query($connection, "delete from tbl_language where id in({$delete_id})");

    if($delete_query > 0){
        echo "Data deleted !";
    } else {
        echo "Error !";
    }
 ?>