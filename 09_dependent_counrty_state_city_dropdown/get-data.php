<?php
    include("connection.php");

    $c_id = $_POST['country_id'];
    $s_id = $_POST['state_id'];
    $type = $_POST['type'];

    if($type == 'state'){
        $fetch_query = mysqli_query($connection, "select * from tbl_city where state_id='$s_id'");
    } else {
        $fetch_query = mysqli_query($connection, "select * from tbl_state where country_id='$c_id'");
    }
    

    $result = "";

    while($res_arr = mysqli_fetch_array($fetch_query)){
        $result .='<option value='.$res_arr['id'].'>'.$res_arr['name'].'</option>';
    }

    echo $result; 
?>