$(document).ready(function(){
$('#reg_submit').click(function(e){
var x = new Array();

x[0] = max_length("#username","#d1",10);
x[1] = max_length("#password","#d2",10);
x[2] = max_length("#first_name","#d4",10);
x[3] = max_length("#last_name","#d5",10);
x[4] = max_length("#pno","#d6");
//to restric to that length
x[5] = numbers_only("#pno","#d6");
x[6] = numbers_only("#zip","#d10");
x[7] = numbers_only("#fax","#d11");
x[8] = numbers_only("#zip1","#15");
x[9] = numbers_only("#fax1","#d16");
//restrict values other than numbers
x[10] = regular_exp('#email','#d3',/^[a-z0-9_-]+@[a-z0-9._-]+\.[a-z]+$/i);
x[11] = regular_exp("#first_name","#d4",/^[A-Za-z]+$/);
x[12] = regular_exp("#last_name","#d5",/^[A-Za-z]+$/);
x[13] = regular_exp("#employer","#d18",/^[A-Za-z]+$/);
x[14] = regular_exp("#street","#d7",/^[A-Za-z]+$/);
x[15] = regular_exp("#city","#d8",/^[A-Za-z]+$/);
x[16] = regular_exp("#state","#d9",/^[A-Za-z]+$/);
x[17] = regular_exp("#street1","#d12",/^[A-Za-z]+$/);
x[18] = regular_exp("#city1","#d13",/^[A-Za-z]+$/);
x[19] = regular_exp("#state","#d14",/^[A-Za-z]+$/);
//for regular expression checking
x[20] = is_empty("#username","#d1");
x[21] = is_empty("#password","#d2");
x[22] = is_empty("#email","#d3");
x[23] = is_empty("#first_name","#d4");
x[24] = is_empty("#last_name","#d5");
x[25] = is_empty("#employer","#d18");
x[26] = is_empty("#pno","#d6");
x[27] = is_empty("#street","#d7");
x[28] = is_empty("#city","#d8");
x[29] = is_empty("#state","#d9");
x[30] = is_empty("#zip","#d10");
x[31] = is_empty("#fax","#d11");
x[32] = is_empty("#street1","#d12");
x[33] = is_empty("#city1","#d13");
x[34] = is_empty("#state1","#d14");
x[34] = is_empty("#zip1","#d15");
x[35] = is_empty("#fax1","#d16");
x[36] = is_empty("#comment","#d17");
//for to check wheather empty or not
var decider=0;
for (var i = 0; i < x.length; i++) {
	if(x[i] === false){
		decider++;	
	}
}
if(decider !== 0){
	return false;
}
else{
	return true;
}

});
});
//form and registration
$(document).ready(function(){
$('#log_submit').click(function(e){
var x = new Array();
x[0] = max_length("#username","#d1",10);
x[1] = max_length("#password","#d2",10);
x[2] = is_empty("#username","#d1");
x[3] = is_empty("#password","#d2");
var decider=0;
for (var i = 0; i < x.length; i++) {
	if(x[i] === false){
		decider++;	
	}
}
if(decider !== 0){
	return false;
}
else{
	username=$("#username").val();
	password=$("#password").val();
	if(username === "" || password === ""){
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
                	if(response.id && response.username && response.admin==1){
                  		window.location.replace('allusers.php');
                  	}
                  	else if(response.id && response.username)
                  	{
                  		window.location.replace('detail.php');
                  	}
                  	else{
                  		$("div#ack").html(response.wrong);
                  	}
                }

            });
       	}
	//return true;
}

});
});
//for login
$(document).ready(function(){
$('#forgot_submit').click(function(e){
var x = new Array();
x[0] = regular_exp('#email','#d3',/^[a-z0-9_-]+@[a-z0-9._-]+\.[a-z]+$/i);
x[1] = is_empty("#email","#d3");
x[2] = max_length("#password","#d2",10);
x[3] = is_empty("#password","#d2");
var decider=0;
for (var i = 0; i < x.length; i++) {
	if(x[i] === false){
		decider++;	
	}
}
if(decider !== 0){
	return false;
}
else{
	return true;
}

});
});
/*	Purpose: to find the input value is empty or not
	Input Parameters: name of the input and id where to print error 
	Return Value: True if its is empty or false
*/
function is_empty(name,id){
	var value = $.trim($(name).val());
	if (value.length == 0) {
		var error = '<div class="alert-danger" role="alert">' +
				'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
				'<span class="sr-only">Error:</span>' +
 			 	'Do not leave it empty' +
 			 '</div>';
		$(id).html(error); 
		$(name).focus();
		return false;
	}
	else{
		return true;
	}
}
/*
	Purpose: Calculates the length of the value and compares with maximum value
	Input Parameters: name of the input, Max length value and the id where to print error
	Return Value: False if its is more than maximum length or true
*/
function max_length(name,id,size){
	var value = $.trim($(name).val());
	if(value.length > size){
		var error = '<div class="alert-danger" role="alert">' +
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
						'<span class="sr-only">Error:</span>' +
 			 				'can not have more than 10 digits' +
 			 		'</div>';
 		$(id).html(error); 
		$(name).focus();
		return false;
	}	
	else{
		return true;
	}
}
/*
	Purpose: checks that input value is number or not
	Input Parameters: name of the input and the id where to print error
	Return Value: False if its is number or true
*/
function numbers_only(name,id){
	var x = $(name).val();
	if(isNaN(x)){
		var error = '<div class="alert-danger" role="alert">' +
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
						'<span class="sr-only">Error:</span>' +
 			 				'Only numbers please!' +
 			 		'</div>';
 		$(id).html(error); 
		$(name).focus();
		return false;	
	}
	else{
		return true;
	}
}
/*
	Purpose: To find the input value is in proper format or nor (regular format) 
	Input Parameters: name of the input,id that where to print error,and format of regular expression
	Return Value: return false if the input is not in proper format
*/
function regular_exp(name,id,reg_exp){
	var x = $(name).val();
		var regular = reg_exp;

	if(!(x.match(regular))){
		var error = '<div class="alert-danger" role="alert">' +
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
						'<span class="sr-only">Error:</span>' +
 			 				'Enter proper format please' +
 			 		'</div>';
 		$(id).html(error);
		$(name).focus();
		return false;
	}
	else{
		return true;
	}
}