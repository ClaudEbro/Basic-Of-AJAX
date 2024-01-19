<?php
    include("connection.php");

    $limit_page = 3;
    $page = "";

    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    } else {
        $page = 0;
    }

    $fetch_query = mysqli_query($connection,
                                "select * from employee limit $page, $limit_page");
    
    
    $row = mysqli_num_rows($fetch_query);

    if($row > 0){
        
        $output = "";
        while($res = mysqli_fetch_array($fetch_query)){
            $last_id = $res['id'];
            $output .="<tbody><tr>
                        <td>{$res['id']}</td>
                        <td>{$res['name']}</td>
                        <td>{$res['email']}</td>
                        <td>{$res['category']}</td>
                        <td>{$res['phone']}</td>
                        <td>{$res['address']}</td>
                    </tr></tbody>";
        }
        $output .="<tbody id='load_more'>
                    <tr>
                        <td colspan='6'>
                            <center><button class='btn btn-primary' id='load_btn' data-id='{$last_id}'>Load More</button></center>
                        </td></tr>
                </tbody>";          
        echo $output;
    }
?>