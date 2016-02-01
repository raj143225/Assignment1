$("button#submit").click(function(){
	if($("#username").val()==="" || $("#password").val()===""){
		$("div#ack").text("Please enter both username and password");
		
		return false;
	}
	else{
		$.post( $("#my_form").attr("login.php"),
				$("#my_form :input").serializeArray(),
				 function(data){
				 	//alert(data);
				 //	$("div#ack").html(data);
				 });
	
		$("#my_form").submit(function(){
					$("div#ack").text("Success");
			return true;	
		});
	}
});