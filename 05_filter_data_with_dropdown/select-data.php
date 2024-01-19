<?php

    include("connection.php");

    $catname = $_POST['cat_name'];

    if($catname!="All"){
        $cond = "'$catname'";
    }
    else{
        $cond = 0;
    }

    $fetch_query = mysqli_query($connection,
                                "select * from employee where category=$cond");
                                
    $row = mysqli_num_rows($fetch_query);

    if($row > 0){
        while($res = mysqli_fetch_array($fetch_query)){
            ?>
                <tr>
                    <td><?php echo $res['id']; ?></td>
                    <td><?php echo $res['name']; ?></td>
                    <td><?php echo $res['email']; ?></td>
                    <td><?php echo $res['category']; ?></td>
                    <td><?php echo $res['phone']; ?></td>
                    <td><?php echo $res['address']; ?></td>
                </tr>
        <?php }
    }
?>