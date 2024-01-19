<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>Insert Checkbox Value</title>
</head>
<style>
    .box{
        width: 100%;
        max-width: 600px;
        padding: 16px;
        margin: 0 auto;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .error{
        color: red;
        font-weight: 700;
    }
</style>
<body>
    <div class="container">
        <div class="table-responsive">
        <h3 align="center">Insert Checkbox Value using AJAX in PHP</h2>
        <br/>
            <div class="box">
                <div class="form-group">
                    <label for="name">Enter Your Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="email">Enter Your Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="language">Select Language</label><br>
                    <input type="checkbox" class="language" value="JAVA"/>JAVA
                    <input type="checkbox" class="language" value="PHP"/>PHP
                    <input type="checkbox" class="language" value=".NET"/>.NET
                </div>
                <div class="form-group">
                    <input type="submit" name="register" id="register" value="Submit" class="btn btn-success">
                </div>
                <p class="error"></p>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#register").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var lang_name = [];

            $(".language").each(function(){
                if($(this).is(":checked")){
                    lang_name.push($(this).val());
                }
            });

            language = lang_name.toString();
           
            $.ajax({
                url: "insert-data.php",
                method: "post",
                data: {name:name, email:email, language_name:language},
                success: function(result){
                    $(".error").html(result); 
                }
            });
        });
    });
</script>