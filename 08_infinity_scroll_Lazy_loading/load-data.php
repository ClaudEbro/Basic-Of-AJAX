<?php
    include("connection.php");

    if(isset($_POST['limit_page'], $_POST['start_page'])){
        $limit_page = $_POST['limit_page'];
        $page_start = $_POST['start_page'];

        $fetch_query = mysqli_query($connection,
                                    "select * from tbl_data limit $page_start, $limit_page");
        
        $row = mysqli_num_rows($fetch_query);

        if($row > 0){
            $output = "";

            while($res = mysqli_fetch_array($fetch_query)){
                $output .="<tbody><tr>
                            <td>{$res['id']}</td>
                            <td>{$res['data']}</td>
                        </tr><tbody>";
            }       
            echo $output;
        }
    }
?>