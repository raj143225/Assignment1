$(document).ready(function(){
    $('#role_submit').click(function(e){
        var id = $("#id").val();
        var role = $("#role").val();
        $.ajax({
            method: 'POST',
            url: 'rolepost.php',
            dataType: 'json',
            data: {
                id: id, 
                type: type
            },
            success: function( response ) {
                if(response['success']==success)
                {
                    console.log("success");
                }              
            }

        });
    });
});
