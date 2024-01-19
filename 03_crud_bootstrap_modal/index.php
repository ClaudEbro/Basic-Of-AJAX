<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
        <h2 class="text-center">CRUD with Modal using jQuery AJAX</h2>
        <br/>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">Add new User</button>
        <br><br/>
        <table class="table table-bordered">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
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
        getdata();
        updaterecord();
        deleteuser();
        $("#register").on("click", function(e){
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var address = $("#address").val();

                $.ajax({
                    url: "insert-data.php",
                    method: "post",
                    data: {fullname: name, emailid: email, phone: phone, address: address},
                    success: function(data){
                        $("#err").html(data);
                        $("form").trigger('reset'); 
                        showdata();
                    }
                });
        });
     });

     function showdata(){
      $.ajax({
        url: "show-data.php",
        method: "post",
        success: function(result){
          $("#result").html(result);
        }
      });
     }

     function getdata(){
        $(document).on("click", "#edit_btn", function(){
            var id = $(this).attr('data-id');
            //console.log(id);

            $.ajax({
                url: "get-data.php",
                method: "post",
                data: {userid: id},
                dataType: 'JSON',
                success: function(data){
                   $("#updateuser").modal('show');
                   $("#userid").val(data.id);
                   $("#edit_name").val(data.name);
                   $("#edit_email").val(data.email);
                   $("#edit_phone").val(data.phone);
                   $("#edit_address").val(data.address); 
                }
            });
        });

     }

     function updaterecord(){
        $(document).on("click", "#update", function(){
            var id = $("#userid").val();
            var name = $("#edit_name").val();
            var email = $("#edit_email").val();
            var phone = $("#edit_phone").val();
            var address = $("#edit_address").val();

            $.ajax({
                url: "update-data.php",
                method: 'post',
                data: { id:id, name: name, email: email, phone: phone, address: address},
                success: function(data){
                    $('#update_err').html(data);
                    showdata();
                }

            })
        });
     }

     function deleteuser(){
        $(document).on("click", "#dlt_btn", function(){
            var id = $(this).attr('data-id-dlt'); 
            $("#deleteuser").modal('show');

            $(document).on("click","#delete", function(){
                $.ajax({
                    url: "delete-data.php",
                    method:"post",
                    data: {userid: id},
                    success: function(data){
                        $("#delete_err").html(data);
                        showdata();
                    }
                })
            });
     });
     }

     $(document).on("click","#close_btn", function(e){
        $("#err").html('');
        $('#update_err').html('');
        $('#delete_err').html('');
     })
</script>


<!-- Add Modal -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="box">
        <form>
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
        </form>
          <br>
          <div class="form-group">
              <input type="submit" name="register" id="register" value="Register" class="btn btn-success">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close_btn">Close</button>
          </div>
          <p class="error" id="err"></p>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Update	 Modal -->
<div class="modal fade" id="updateuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="box">
        <form>
          <div class="form-group">
              <label for="name">Enter your name</label>
              <input type="text" name="name" id="edit_name" placeholder="Enter your name" class="form-control">
              <input type="hidden" id="userid">
          </div>
          <div class="form-group">
              <label for="email">Enter your Email</label>
              <input type="text" name="email" id="edit_email" placeholder="Enter your Email" class="form-control">
          </div>
          <div class="form-group">
              <label for="phone">Enter your phone number</label>
              <input type="text" name="phone" id="edit_phone" placeholder="Enter your phone number" class="form-control">
          </div>
          <div class="form-group">
              <label for="address">Enter your address</label>
              <textarea name="address" id="edit_address" placeholder="Enter your address" required class="form-control"></textarea>
          </div>
        </form>
          <br>
          <div class="form-group">
              <input type="submit" name="update" id="update" value="Update" class="btn btn-success">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close_btn">Close</button>
          </div>
          <p class="error" id="err"></p>
          <p class="error" id="update_err"></p>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Do you really want to delete ?</p>
          <div class="form-group">
              <input type="submit" name="delete" id="delete" value="Delete" class="btn btn-success">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close_btn">Close</button>
          </div>
          <p class="error" id="delete_err"></p>
      </div>
    </div>
  </div>
</div>