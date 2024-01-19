<?php
    include("connection.php");

    $employee = $_POST['emp_name'];

    $fetch_data = mysqli_query($connection, "select * from employee where name like '%{$employee}%'");

    $result = "";

    if(mysqli_num_rows($fetch_data)){

        while($res = mysqli_fetch_array($fetch_data)){
            $result .="<li>{$res['name']}</li>";
        }
        $result .="</ul>";
    }
    else{
        $result .="<li>Employee not Found</li>";
    }
    echo $result;
?>