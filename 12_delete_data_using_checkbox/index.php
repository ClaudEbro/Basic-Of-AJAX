<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>Delete Data with Select All</title>
</head>
<style>
    .box{
        width: 100%;
        max-width: 900px;
        padding: 16px;
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .msg{
      color: red;
      font-weight: 700;  
    }
</style>
<body>
    <div class="container">
        <div class="table-responsive">
        <h3 align="center">Delete Data using Checkbox in PHP with AJAX</h2>
            <div class="box">
                <div class="form-group">
                    <input type="submit" class="btn btn-danger" name="delete" id="delete" value="Delete"/>
                </div>
                <table class="table table-bordered table-striped">
                    <thead style="background-color: #e3a53a;">
                        <th><input type="checkbox" id="select_all" value="0"></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Language</th>
                    </thead>
                    <tbody id="result">
                    </tbody>
                </table>
                <p class="msg"></p>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        function load_result(){
            $.ajax({
                url: "fetch-data.php",
                method: "post",
                success: function(result){
                    $("#result").html(result);
                }
            });
        }
        load_result();

        $("#delete").click(function(){
            var id = [];
            $(':checkbox:checked').each(function(key){
                id[key] = $(this).val();
            });
            if(id.length == 0){
                $(".msg").html("Please select at least one checkbox !");
            } else {
                $.ajax({
                    url: "delete-data.php",
                    method: "post",
                    data: {dlt_id:id},
                    success: function(result){
                        console.log(result);
                        $(".msg").html(result);
                        load_result(); 
                    }
                });
            }
        });

        $("#select_all").change(function(){
           if($(this).is(":checked")){
            $('input[type=checkbox]').each(function(){
                $("#"+this.id).prop('checked',true);
            });
           }else {
                $('input[type=checkbox]').each(function(){
                    $("#"+this.id).prop('checked',false);
            });
           } 
        });
    });
</script>