
      
          function statusChangeCallback(response) {
               console.log('statusChangeCallback');
               console.log(response);
               if (response.status === 'connected') {
                   var accessToken = response.authResponse.accessToken;
                   testAPI();
                } else if (response.status === 'not_authorized') {
                           document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
                } else {
                        document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
                }
           }

          function checkLoginState() {
               FB.getLoginStatus(function(response) {
               statusChangeCallback(response);
               });
           }

          window.fbAsyncInit = function() {
               FB.init({
               appId      : '487750598076158',
               cookie     : true,
               xfbml      : true,  
               version    : 'v2.5' 
             });
           };

          (function(d, s, id) {
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) return;
               js = d.createElement(s); js.id = id;
               js.src = "//connect.facebook.net/en_US/sdk.js";
               fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
           // Here we run a very simple test of the Graph API after login is
  			// successful.  See statusChangeCallback() for when this call is made.
			function testAPI() {
   				//console.log('Welcome!  Fetching your information.... ');
    			FB.api('/me', function(response) {
			      //console.log('Successful login for: ' + response.name);
			      //var name=document.getElementById('status').innerHTML ='Thanks for logging in, ' + response.name + '!';
			
			      var username = response.name;
			      console.log(username);
			      if(username) {
			      		window.location.replace('http://myweb.com/project/Assignment1/detail.php?username=' + username + '');
			      }
			    });
  			}

