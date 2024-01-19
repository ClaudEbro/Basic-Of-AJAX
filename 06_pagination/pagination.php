<?php
    include("connection.php");

    $limit_page = 3;
    $page=" ";

    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }
    else{
        $page = 1;
    }

    $offset = ($page-1)*$limit_page;

    $fetch_query = mysqli_query($connection,
                                "select * from employee limit $offset, $limit_page");
    
    $output = "";
    $row = mysqli_num_rows($fetch_query);

    if($row > 0){
        $output .='<table class="table table-bordered table-striped">
        <thead style="background-color:#e3a53a;">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Category</th>
            <th>Phone</th>
            <th>Address</th>
        </thead>';

        while($res = mysqli_fetch_array($fetch_query)){
            $output .="<tr>
                        <td>{$res['id']}</td>
                        <td>{$res['name']}</td>
                        <td>{$res['email']}</td>
                        <td>{$res['category']}</td>
                        <td>{$res['phone']}</td>
                        <td>{$res['address']}</td>
                    </tr>";
        }
        $output .="</table>";

        $fetch_query = mysqli_query($connection, "select * from employee");
        $row = mysqli_num_rows($fetch_query);
        $total_page = ceil($row/$limit_page);

        $output .='<ul class="pagination">';

        for($i=1; $i<=$total_page; $i++)
        {
            if($i==$page){
                $active = "active";
            }
            else{
                $active = "";
            }
            $output .= "<li class='{$active}'><a id='{$i}'>{$i}</a></li>";
        }
        $output .="</ul>";
                   
        echo $output;
    }
?>