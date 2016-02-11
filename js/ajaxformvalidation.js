$(document).ready(function(){
  $('#email').keyup(function(e){
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
                          var progress_bar = '<div id="progress" class="progress hiddenDiv">' + 
                                          '<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">' + 'Checking' +
                                          '</div>' + 
                                          '</div>';
                          $("div#d3d3d3").html(progress_bar);
                      }
                  }
    });
  });
});
//verifing input email is is exist in database or not
$(document).ready(function(){
$('#email').keydown(function(e){
         $("div#d3d3d3").html("");
  });
});
//for emptying the string
$(document).ready(function(){
  $('#username').keyup(function(e){
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
                          $("div#d1d1").html(icon);
                          var progress_bar = '<div id="progress" class="progress hiddenDiv">' + 
                                          '<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">' + 'Checking' +
                                          '</div>' + 
                                          '</div>';
                          $("div#d1d1d1").html(progress_bar);
                      }
                  }
    });
  });
});
//verifing input username is is exist in database or not
$(document).ready(function(){
$('#username').keydown(function(e){
    $("div#d1d1d1").html("");
  });
});
//for emptying the string
$(document).ready(function(){
    $('#role_check').change(function(e){
    var role_id = $("#role_check").val();
    console.log(role_id);
    var requestURL = 'privilegepost.php';
    $.ajax({
      method: 'POST',
      url: requestURL,
      dataType: 'json',
      data: {
        role: role_id
      },
      success: function( response ) {
        if(response.display){
          //console.log(response.display);
          $("div#display").html(response.display);
        }
      }
    });
  });
});
//for privilages details
 function changePrivilege(result,role,resource_id,operation_id){   
    $.ajax({
        method: 'POST',
        url: 'privilegepost.php',
        dataType: 'json',
        data: {
          result:result,
          resource_id: resource_id,
          roles: role,
          operation_id: operation_id
        },
        success: function(response){
        }
    });   
}
//updating privileges details when user checked/uncheked
$(document).ready(function(){
    $('.role-change-submit').click(function(e){
      var countVal = $(this).data('count');
      //var role_id = $('#input-container-' + countVal).find("input[name='id']").val();
      var role = $('#select-container-' + countVal).find("select[name='role']").val();
      var role_id = $('#button-container-' + countVal).find("button[name='submit']").val();
      console.log(role_id);
      var requestURL = 'rolepost.php';
      $.ajax({
        method: 'POST',
        url: requestURL,
        dataType: 'json',
        data: {
          role: role,
          id : role_id
        },
        success: function( response ) {
          if(response.display){
            console.log("success");
        }
      }
    });
  });
});
/*for google login*/
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
}
/*for sign out*/
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }


