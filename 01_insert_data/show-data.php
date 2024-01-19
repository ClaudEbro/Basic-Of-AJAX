<?php
    include("connection.php");

    $res_arr = [];

    $fetch_query = mysqli_query($connection,
                                "select * from employee");
                                
    $row = mysqli_num_rows($fetch_query);

    if($row > 0){

        //Display Data first solution
        /*while($res = mysqli_fetch_array($fetch_query)){
            ?>
                <tr>
                    <td><?php echo $res['id']; ?></td>
                    <td><?php echo $res['name']; ?></td>
                    <td><?php echo $res['email']; ?></td>
                    <td><?php echo $res['phone']; ?></td>
                    <td><?php echo $res['address']; ?></td>
                </tr>
        <?php }*/

        //Display Data with JSON
        foreach($fetch_query as $res){
            array_push($res_arr, $res);
        }
        echo json_encode($res_arr);
    }
?>