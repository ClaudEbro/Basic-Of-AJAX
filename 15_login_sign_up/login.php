<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>Login - Signup using jQuery AJAX in PHP</title>
</head>
<style>
    .box{
        width: 100%;
        max-width: 600px;
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
        <h3 align="center">Login Form</h3>
            <div class="box">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Your Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="login" id="login" value="Login" class="btn btn-success">
                    <a href="index.php">Register</a>
                </div>
                <p class="msg"></p>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#login").on("click", function(){
            var email = $("#email").val();
            var password = $("#pwd").val();
            if(email == '' || password == ''){
                $(".msg").html("Both fields are required !");
            } 
            else{
                $.ajax({
                    url: "fetch-data.php",
                    method: "post",
                    data: {emailid:email, pwd:password},
                    dataType: "JSON",
                    success: function(data){
                        if(data['status'] == 1){
                            $(".msg").html(data['msg']);
                            setTimeout(function(){
                                window.location.href="dashboard.php";
                            },2000);
                        }else {
                            $(".msg").html(data['msg']);  
                        }
                    }
                });
            } 
        });
    });
</script>