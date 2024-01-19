<?php
    include("connection.php");

    $fetch_query = mysqli_query($connection, "select * from tbl_language");
    $row = mysqli_num_rows($fetch_query);

    $result = "";

    if($row > 0){
        while($res = mysqli_fetch_array($fetch_query)){
            $result .="<tr>
                        <td><input type='checkbox' value='{$res['id']}' id='{$res['id']}'></td>
                        <td>{$res['id']}</td>
                        <td>{$res['name']}</td>
                        <td>{$res['email']}</td>
                        <td>{$res['language']}</td>
                    </tr>";
        }
        echo $result;
    }
?>