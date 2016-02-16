<?php
session_start();
require 'header.php';
?>
<!--<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '487750598076158',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>-->
<div class="col-lg-12 h1 well">	
<?php if($_SESSION['not_conf_msg']) { ?>
<lable class="lab2"><?php echo $_SESSION['not_conf_msg']; $_SESSION['not_conf_msg']=null ?></lable><?php } ?>
<?php if($_SESSION['conf_msg']) { ?>
<lable class="lab2"><?php echo $_SESSION['conf_msg']; $_SESSION['conf_msg']=null ?></lable><?php } ?>
<?php if($_SESSION['active_msg']) { ?>
<lable class="lab2"><?php echo $_SESSION['active_msg']; $_SESSION['active_msg']=null ?></lable><?php } ?>
<?php if($_SESSION['logout']) { ?>
<lable class="lab2"><?php echo $_SESSION['logout']; $_SESSION['logout']=null ?></lable><?php } ?>
<?php if($_SESSION['error_occured_in_activation']) { ?>
<lable class="lab2"><?php echo $_SESSION['error_occured_in_activation']; $_SESSION['error_occured_in_activation']=null ?></lable><?php } ?>
<div id="ack" class="lab2"></div>
<center> LogIn</center> </div>
<div class="col-lg-12 well">
	<div class="row">
		<form class="form" id="my_form" action="loginpost.php" method="post">
			<div class="col-sm-12 row">
		<!--	<div>
					<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
     				</fb:login-button><br /><br />
			</div>
			<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
				<div class="form-group">
					<label class="control-label col-sm-4" for="username"><h4><center>Username</h4></center></label>
					<div class="col-sm-8">
						<input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $username; ?>">
					</div>
					<?php if($_SESSION['blank_user']) { ?>
					<lable class="lab1"><?php echo $_SESSION['blank_user']; $_SESSION['blank_user']=null ?></lable><?php } ?>
					<div id="d1"></div>
				</div>
			</div>
			<div class="col-sm-12 row">
				<div class="form-group">
					<label class="control-label col-sm-4" name="password" for="email"><h4><center>Password</h4></center></label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $_SESSION['password']; ?>">
					</div>
					<?php if($_SESSION['blank_pass']) { ?>
					<lable class="lab1"><?php echo $_SESSION['blank_pass']; $_SESSION['blank_pass']=null ?></lable><?php } ?>
					<div id="d2"></div>
				</div>
			</div>
			<div class="col-sm-12 row">	
				
				<div class="form-group col-sm-8 b1 lb">	
					<center><button type="button" id="log_submit" class="btn btn-lg btn-info" name="submit" value="submit">LogIn</button></center>	
				</div >		
				<div class="form-group col-sm-4 ">			
					<a class="a1" href="forgot.php">Forgot/Change Password</a>
				</div>
			</div>
			
		</form> 
	</div>
</div>
         <!--   <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>-->
<?php
require 'footer.php';
?>
