$(document).ready(function(){
    var username = $("#username").val();
    var val = [];
    val['formname']='#reg_form';
    val['url']='formpost.php';
    val['area']='div#d4';
    val['input']='first_name';
    val['all_input']= '#my_form :input',


// $('#first_name').blur(ajaxval(val));
    /*$('#first_name').on('blur',function () {
       console.log("hello");
    });*/ 
    $('#first_name').keydown(function(event) {
        ajaxval(event, val);

    });
});

    function ajaxval(curObj, val){

     
        $.post( $(val['formname']).attr(val['url']),
        $(val['all_input']).serializeArray(),
                 function(response){
                console.log(response);
                //$(val['area']).html(data);
            });

    }
    
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
