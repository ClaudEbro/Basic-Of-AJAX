<?php
    include("connection.php");

    $search = $_POST['search'];

    $search_query = mysqli_query($connection,
    "select * from employee where name like '%{$search}%'");

    $row = mysqli_num_rows($search_query);

    if($row > 0){
        while($res = mysqli_fetch_array($search_query)){
            ?>
                <tr>
                    <td><?php echo $res['id']; ?></td>
                    <td><?php echo $res['name']; ?></td>
                    <td><?php echo $res['email']; ?></td>
                    <td><?php echo $res['phone']; ?></td>
                    <td><?php echo $res['address']; ?></td>
                </tr>
        <?php }
    }
?>