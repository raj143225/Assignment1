<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--for ggole login-->
    <meta name="google-signin-client_id" content="976421833126-e7e2a3nr7nkimb94qfjcar5e3hq5b6as.apps.googleusercontent.com">
    <!--for ggole login-->
    <title>MINDFIRE</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
   <link href="css/styleform.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
   <!--theme for JQgrid-->
   <link rel="stylesheet" type="text/css" href="http://trirand.com/blog/jqgrid/themes/ui.jqgrid.css">
   <!--theme for JQgrid--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <link href="css/business-casual.css" rel="stylesheet">
    <!--for google login-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
    <div class="brand">Mindfire Solutions</div>
    <div class="address-bar">MANCHESHWAR | BHUBANESHWAR | ORISSA</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="#">Mindfire Solutions</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                        if((!$_SESSION['id']) || (!$_SESSION['username']))
                        {
                    ?>
                    <li>
                        <a href="login.php">LogIn</a>
                    </li>
                    <li>
                        <a href="index.php">Register</a>
                    </li><?php } ?>
                    
                     <?php
                        if(($_SESSION['id'] && $_SESSION['admin']==0) || $_SESSION['username'])
                        {
                    ?><li>
                        <a href="profile.php">Update</a>
                    </li>
                    <li>
                        <a href="detail.php">Profile</a>

                    </li>
                    <li>
                        <a href="logout.php" onclick="signOut();">Logout</a>
                    </li>
                    <?php } ?>
                      <?php
                        if($_SESSION['id'] && $_SESSION['admin']==1)
                        {
                    ?>
                    <li>
                        <a href="role.php">Roles</a>

                    </li>
                    <li>
                        <a href="adminmanage.php">Manage</a>

                    </li>
                    <li>
                        <a href="privilages.php">Privileges</a>

                    </li>
                     <li>
                        <a href="admin.php">Grids</a>

                    </li>
                    <li>
                        <a href="logout.php" onclick="FB.logout(function(response){});">Logout</a>
                    </li>
                    <?php } ?>
                </ul>
                <?php
                    if($_SESSION['id'])
                    {
                ?>
                <div class="namee">Welcome <?php echo $_SESSION['username']; ?></div>
                 <?php
                    }
                 ?>   
            </div>
            <!-- /.navbar-collapse -->
       
        <!-- /.container -->
    </nav>
<div class="container">


