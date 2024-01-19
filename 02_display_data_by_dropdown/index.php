<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Display Data By Dropdown</title>
</head>

<body>
    <div class="container">
    <h2 class="text-center">Display Data using jQuery AJAX</h2>
    <br>
    <div class="row">
        <div class="col-md-4">
            <select class="form-control" onchange="showdata(this.options[this.selectedIndex].value)">
                <option value="">Please select Name</option>
                <?php
                    include("connection.php");
                    $select_query = mysqli_query($connection, "select id, name from employee");
                    while($row = mysqli_fetch_array($select_query)){?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <br>
        
        <table class="table table-bordered table-responsive" id="result" style="display: none; width: 50%;">
            <tr>
                <td width="10%"><b>Name:</b></td>
                <td width="90%"><span id="name"></span></td>
            </tr>
            <tr>
                <td width="10%"><b>Email:</b></td>
                <td width="90%"><span id="email"></span></td>
            </tr>
            <tr>
                <td width="10%"><b>Phone:</b></td>
                <td width="90%"><span id="phone"></span></td>
            </tr>
            <tr>
                <td width="10%"><b>Address:</b></td>
                <td width="90%"><span id="address"></span></td>
            </tr>
        </table>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript">
    function showdata(id){
        $.ajax({
            url: "show-data.php",
            method: "post",
            data : 'id='+id,
            success: function(result){
                var jsondata = $.parseJSON(result);

                $('#result').css("display","block");
                
                $("#name").html(jsondata.name);
                $("#email").html(jsondata.email);
                $("#phone").html(jsondata.phone);
                $("#address").html(jsondata.address);
            }
        });
    }
</script>
