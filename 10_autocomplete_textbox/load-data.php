<?php
    include("connection.php");
    $employee = $_POST['emp'];

    $fetch_data = mysqli_query($connection, "select * from employee where name = '$employee'");

    $result = '';

    if(mysqli_num_rows($fetch_data) > 0){

        $result .='<table class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>';
        while($res = mysqli_fetch_array($fetch_data)){
            $result .="<tr>
                        <td>{$res['id']}</td>
                        <td>{$res['name']}</td>
                        <td>{$res['email']}</td>
                        <td>{$res['category']}</td>
                        <td>{$res['phone']}</td>
                        <td>{$res['address']}</td>
                        </tr>";
        }
        $result .='</table>';
    }
    else {
        echo "Employee not found";
    }
    echo $result;
?>