<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>Pagination in AJAX</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">AJAX Pagination using jQuery AJAX</h2>
        <br/>
        <div id="result">

        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        showdata();
    });

    function showdata(page){
        $.ajax({
            url: "pagination.php",
            method: "post",
            data: {page_no:page},
            success: function(result){
                $("#result").html(result);    
            }
        });
    }

$(document).on("click", ".pagination a", function(){
    var page = $(this).attr('id');
    showdata(page);
})
</script>
