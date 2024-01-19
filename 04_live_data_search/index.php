<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>jQuery AJAX</title>
</head>
<style>
    .box{
        max-width: 50%;
        float: right;
    }
</style>
<body>
    <div class="container">
        <h2 class="text-center">Searching Data using jQuery AJAX</h2>
        <br/>
        <div class="box">
            <div class="form-group">
                <input type="text" name="search" id="search" placeholder="Search" class="form-control">
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead style="background-color:orange;">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </thead>
            <tbody id="result">

            </tbody>
        </table>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        showdata();
        livesearch();
    });

    function livesearch(){
        $(document).on("keyup", "#search", function(){
            var search_data = $(this).val();
            
            $.ajax({
                url: "search-data.php",
                method: "post",
                data: {search:search_data},
                success: function(data){
                    $("#result").html(data);   
                }
            });
        });
    }

    function showdata(){
        $.ajax({
            url: "show-data.php",
            method: "post",
            success: function(result){
                $("#result").html(result);    
            }
        });
    }
</script>
