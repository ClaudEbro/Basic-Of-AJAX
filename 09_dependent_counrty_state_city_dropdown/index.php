<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>AJAX Country State City Dropdown</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">AJAX Country State City Dropdown</h2>
        <br/>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="country">Country:</label>
                    <select class="form-control" id="country">
                        <option value="0">Select Country</option>
                        <?php
                            include("connection.php");
                            $fetch_country = mysqli_query($connection, "select * from tbl_country");
                            while($country = mysqli_fetch_array($fetch_country)){
                            ?>
                            <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="state">State:</label>
                    <select class="form-control" id="state">
                        <option>Select State</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="city">City:</label>
                    <select class="form-control" id="city">
                        <option>Select Country</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#country").change(function(){
            var id = $(this).val();

            if(id == '0'){
                $("#state").html('<option value="0">Select State</option>');
                $("#city").html('<option value="0">Select City</option>');
            }
            else {
                $("#state").html('<option value="0">Select State</option>');
                $("#city").html('<option value="0">Select City</option>');
            
                $.ajax({
                    url: "get-data.php",
                    method: "post",
                    data: {country_id: id},
                    success: function(result){
                        $("#state").append(result);
                    }
                });
            }
        });

        $("#state").change(function(){
            var id = $(this).val();

            if(id == '0'){
                
                $("#city").html('<option value="0">Select City</option>');
            }
            else {
                
                $("#city").html('<option value="0">Select City</option>');
            
                $.ajax({
                    url: "get-data.php",
                    method: "post",
                    data: {state_id: id, type:'state'},
                    success: function(result){
                        $("#city").append(result);
                    }
                });
            }
        });
    });
</script>