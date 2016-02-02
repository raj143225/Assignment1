$(document).ready(function(){
$('#email').blur(function(e){
	
	var email = $("#email").val();
    var username = $("#username").val();
	
	$.ajax({
                method: 'POST',
                url: 'formpost.php',
                dataType: 'json',
                data: {
                    username: username,
                    email: email
                    },
                success: function( response ) {
                     if(response.emailalready){
                        var error = '<div class="alert-danger" role="alert">' +
                    '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
                    '<span class="sr-only">Error:</span>' +
                    'already used' +
                    '</div>';
                   
                	 	$("div#d3d3").html(error);
                         var icon = ' <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true">' + '</span>';
                        $("div#d3d3").append(icon);
                       
                	 }
                     else if(response.email === "Email cannot be blank ")
                     {
                        var error = '<div class="alert-danger" role="alert">' +
                    '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
                    '<span class="sr-only">Error:</span>' +
                    'canot be empty'
                    '</div>';
                   
                        $("div#d3d3").html(error);
                         var icon = ' <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true">' + '</span>';
                        $("div#d3d3").append(icon);
                     }
                      else{

                             var icon = '<span class="has-success glyphicon glyphicon-ok form-control-feedback" aria-hidden="true">' + '</span>';
                            $("div#d3d3").html(icon);
                        }
                    }

            });

});
});
$(document).ready(function(){
$('#username').blur(function(e){
    var username = $("#username").val();
    $.ajax({
                method: 'POST',
                url: 'formpost.php',
                dataType: 'json',
                data: {
                    username: username
                    },
                success: function( response ) {
                    if(response.usernamealready){
                        var error = '<div class="alert-danger" role="alert">' +
                    '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
                    '<span class="sr-only">Error:</span>' +
                    'already used' +
                    '</div>';
                    $("div#d1d1").html(error);
                        var icon = ' <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true">' + '</span>';
                     $("div#d1d1").append(icon);
                     }
                     else if(response.username === "Username cannot be blank ")
                     {
                        var error = '<div class="alert-danger" role="alert">' +
                    '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
                    '<span class="sr-only">Error:</span>' +
                    'canot be empty'
                    '</div>';
                   
                        $("div#d1d1").html(error);
                         var icon = ' <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true">' + '</span>';
                        $("div#d1d1").append(icon);
                     }
                     else{

                             var icon = '<span class="has-success glyphicon glyphicon-ok form-control-feedback" aria-hidden="true">' + '</span>';
                           
                             $("div#d1d1").append(icon);
                        }
                }

            });
});
});
/*else{
		$.post( $("#my_form").attr("login.php"),
				$("#my_form :input").serializeArray(),
				 function(data){
				 	//alert(data);
				 	$("div#ack").html(data);
				 });
	
		$("#my_form").submit(function(){
					$("div#ack").text("Success");
			return true;	
		});
	}*/
