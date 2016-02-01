$("button#log_submit").click(function(){
	username=$("#username").val();
	password=$("#password").val();
	if(username === "" || password === ""){
		$("div#ack").text("Please enter both username and password");
		
		return false;
	}
	else{
		
		$.ajax({
                method: 'POST',
                url: 'loginpost.php',
                dataType: 'json',
                data: {
                    username: username, 
                    password: password
                },
                success: function( response ) {
                	if(response.id && response.username){
                  		window.location.replace('detail.php');
                  	}
                }

            });
       	}
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
});