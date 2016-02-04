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
    <title>MINDFIRE</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
   <link href="css/styleform.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="http://trirand.com/blog/jqgrid/themes/ui.jqgrid.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> <link href="css/business-casual.css" rel="stylesheet">
    <script src="js/img.js"></script>
</ehad>
<body>
    <div class="brand">Mindfire Solutions</div>
    <div class="address-bar">MANCHESHWAR | BHUBANESHWAR | ORISSA</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
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
                        if(!$_SESSION['id'])
                        {
                    ?>
                    <li>
                        <a href="login.php">LogIn</a>
                    </li>
                    <li>
                        <a href="form.php">Register</a>
                    </li><?php } ?>
                    
                     <?php
                        if($_SESSION['id'] && $_SESSION['admin']==0)
                        {
                    ?><li>
                        <a href="profile.php">Update</a>
                    </li>
                    <li>
                        <a href="detail.php">Profile</a>

                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <?php } ?>
                      <?php
                        if($_SESSION['id'] && $_SESSION['admin']==1)
                        {
                    ?>
                    <li>
                        <a href="allusers.php">Users</a>

                    </li>
                     <li>
                        <a href="admin.php">Grids</a>

                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
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
        </div>
        <!-- /.container -->
    </nav>
<div id="agrid">
<?php
if($_SESSION['id']){
?>
<table id="list_records"></table>
<div id="perpage"></div>
<?php
}
else{
	header('Location: login.php');
}
?>
<div>
<!-- /.container -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Your Website 2016</p>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Script to Activate the Carousel -->
 <!--<script src="jsvalidation.js"></script>-->
 <script src="js/jqvalidation.js?12534"></script>
<script src="js/img.js"></script>
<script src="js/ajaxlogin.js?t=" + Math.random()></script>
<script src="js/ajaxfunction.js?t=" + Math.random()></script>
<!--for grid view-->



<script src="http://trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js?t=" + Math.random()></script>
<script src="http://trirand.com/blog/jqgrid/js/jquery.jqGrid.min.js?t=" + Math.random()></script>
<script src="js/jqgrid.js?t=" + Math.random()></script>


</body>
</html>