$(document).ready(function(){
$('#role_submit').click(function(e){
$.ajax({
                var id = $("#id").val();
                var role = $("#role").val();
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
