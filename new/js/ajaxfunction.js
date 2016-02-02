$(document).ready(function(){
$('#first_name').blur();
     var email = $("#email").val();
    var username = $("#username").val();
    var val = [];
    val['formname']='#reg_form'
    val['url']='formpost';
    val['area']='div#d4';
    val['input']='first_name';
    val['all']= '#my_form :input';
});
  function ajaxval(val){
		$.post( $(val['forname']).attr(val['url']),
				$("val['all']").serializeArray(),
				 success: function(data){
				 console.log(data.first_name;)
                 //$(val['area']).html(data);
				 
                 });
	
		};
    
/*  function ajaxval(e){
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
    }
    */
