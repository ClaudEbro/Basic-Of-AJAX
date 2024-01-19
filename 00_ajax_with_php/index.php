<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<input type="text" id="text1">
<a href="#" onclick="on_click()">Click Me</a>

<script type="text/javascript">
    function on_click(){
        var val = $('#text1').val();
        $.ajax({
            url : "read.php",
            method :"post",
            data : 'Data='+val,
            success : function(data){
                alert(data);
            }
        })
    }
</script>