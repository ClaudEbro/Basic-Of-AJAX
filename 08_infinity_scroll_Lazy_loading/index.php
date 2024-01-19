<!DOCTYPE html>
<style>
    .table td
    {
        height: 105px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>AJAX Load More Data</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Infinity Scroll using jQuery AJAX</h2>
        <br/>
        <table id="result" class="table table-bordered table-striped">
            <thead style="background-color:#e3a53a;">
                <th>Id</th>
                <th>Data</th>
            </thead>
        </table>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        var limit_val = 5;
        var start_val = 0;
        
        loaddata(limit_val, start_val);

        function loaddata(limit_val, start_val){
            $.ajax({
                url: "load-data.php",
                method: "post",
                data: {limit_page: limit_val, start_page: start_val},
                success: function(result){                   
                    $("#result").append(result);                                          
                }
            });
        }

        $(window).scroll(function(){
            if($(window).scrollTop() >= $(document).height()-$(window).height())
            {
                start_val = start_val+limit_val;
                loaddata(limit_val, start_val);
            }
        });

    });
</script>
