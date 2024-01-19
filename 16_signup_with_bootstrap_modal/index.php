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
  <h2>Click for Registration</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Signup
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Registration Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->  
        <div class="modal-body">
            <div class="box">
                <div class="form-group">
                    <label for="name">Enter Your Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Enter Your Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Enter Your Password</label>
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Your Password" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label><br>
                    <input type="radio" name="gender" id="gender" value="Male"/> Male
                    <input type="radio" name="gender" id="gender" value="Female"/> Female
                </div>
                <div class="form-group">
                    <input type="submit" name="register" id="register" value="Register" class="btn btn-success">
                </div>
                <p class="msg"></p>
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
        $("#register").on("click", function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#pwd").val();
            var gender = $('input[type="radio"]:checked').val();
            if(name == '' || email == '' || password == ''){
                $(".msg").html("All fields are required !");
            } else if($("#gender:checked").length == 0){
                $(".msg").html("Gender is required !");
            }
            else{
                $.ajax({
                    url: "register-data.php",
                    method: "post",
                    data: {name: name, emailid:email, pwd:password, gender: gender},
                    success: function(data){
                        $(".msg").html(data); 
                    }
                });
            } 
        });
    });
</script>