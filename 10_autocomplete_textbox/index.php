<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>Autocomplete Textbox</title>
</head>
<style>
    #emp-data ul{
        list-style: none;
        position: absolute;
        top: 33px;
        width: 264px;
        padding: 8px;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 4px;
        z-index: 1;
        background: white;
    }

    table th{
        background-color: #e3a53a;
    }
</style>
<body>
    <div class="container">
        <h2 class="text-center">Autocomplete Textbox using AJAX in PHP</h2>
        <br/>
        <div class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="employee" id="employee">
                </div>
                <div id="emp-data"></div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <input type="button" class="btn btn-success" value="Submit" id="sbt_btn">
                </div>
            </div>
            <div class="col-sm-4">

            </div>
            <div id="result"></div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#employee").keyup(function(){
            var emp = $(this).val();
            if(emp!=''){
               $.ajax({
                    url: "get-data.php",
                    method: "post",
                    data: {emp_name: emp},
                    success: function(result){
                        $("#emp-data").fadeIn("fast").html(result);
                    }
               }); 
            }
            else{
               $("#emp-data").fadeOut("fast");  
            }
        });

        $(document).on("click","#emp-data li", function(){
            $("#employee").val($(this).text());
            $("#emp-data").fadeOut("fast");
        });

        $("#sbt_btn").on("click", function(){
            var emp_name = $("#employee").val();
            if(emp_name!=''){
                $.ajax({
                    url: "load-data.php",
                    method: "post",
                    data: {emp: emp_name},
                    success: function(result){
                        $("#result").html(result);
                    }
                });
            }
        });
    });
</script>