<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Signup using Bootstrap Modal</title>
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
  <h2>Click for Login</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    SignIn
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->  
        <div class="modal-body">
            <div class="box">
                <div class="form-group">
                    <label for="email">Enter Your Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="password">Enter Your Password</label>
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Your Password"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" id="login" value="Login" class="btn btn-success">
                </div>
                <p class="msg" id="res"></p>
            </div>
        </div>
        
      </div>
    </div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#login").on("click", function(){
            var email = $("#email").val();
            var password = $("#pwd").val();
            if(email == '' || password == ''){
                $("#res").html("Both fields are required !");
            }
            else{
                $.ajax({
                    url: "fetch-data.php",
                    method: "post",
                    data: {emailid:email, pwd:password},
                    success: function(data){
                        $("#res").html(data); 
                    }
                });
            } 
        });
    });
</script>