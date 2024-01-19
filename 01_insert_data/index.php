<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Registration Form</title>
</head>
<style>
    .box{
        width: 100%;
        max-width: 600px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 16px;
        margin: 0 auto;
    }

    .error{
        color: red;
        font-weight: 700;
    }
</style>
<body>
    <div class="container">
        <div class="table-responsive">
            <h3 align="center">Registration Form</h3>
                <div class="box">
                    <div class="form-group">
                        <label for="name">Enter your name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Enter your Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter your Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Enter your phone number</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Enter your address</label>
                        <textarea name="address" id="address" placeholder="Enter your address" required class="form-control"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" name="register" id="register" value="Register" class="btn btn-success">
                    </div>
                    <p class="error" id="err"></p>
                </div>
        </div>
        <br>
        <h2 class="text-center"> Display Data using jQuery AJAX</h2>
        <br>
        <button id="showdata" class="btn btn-primary">Show Data</button>
        <table class="table table-bordered">
            <thead>
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
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#register").on("click", function(e){
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var address = $("#address").val();

            $.ajax({
                url: "insert-data.php",
                method: "post",
                data: {fullname: name, emailid: email, phone_no: phone, address: address},
                success: function(data){
                    $("#err").html(data);
                }
            });
       })
       
       //Display Data
    //    $("#showdata").on("click", function(e){
    //         $.ajax({
    //             url: "show-data.php",
    //             method: "post",
    //             success: function(result){
    //                 $("#result").html(result);
    //             }
    //         }); 
    //    })

    //Display Data in JSON
    $("#showdata").on("click", function(e){
            $.ajax({
                url: "show-data.php",
                method: "post",
                success: function(result){
                    var jsondata = $.parseJSON(result);
                    $.each(jsondata, function(key, value){
                    $("#result").append('<tr>'+
                        '<td>'+value['id']+'</td>\
                        <td>'+value['name']+'</td>\
                        <td>'+value['email']+'</td>\
                        <td>'+value['phone']+'</td>\
                        <td>'+value['address']+'</td>\
                        </tr>');
                    }); 
                }
            });
        })
    })

</script>