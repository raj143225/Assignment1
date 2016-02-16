<?php
require 'header.php';
require 'dbinfo.php';
require 'acl.php';
session_start();
if($_SESSION['id'] ) {
    //$query="SELECT id,user_name,user_type_id FROM reg WHERE admin='0'";
    $query="SELECT id,first_name,user_type_id FROM reg";
    $result=mysqli_query($connection, $query);?>
    <div class="col-lg-12 well">
    <center><label><h3>All Users</h3></label></center>
    <?php
    $value = 1;
    while($rows_reg = mysqli_fetch_array($result)) {
        $uniid="id-change-"."$value"."";
        $unisid="role-select-change-"."$value"."";
        ?>
        <form class='table form' action="rolepost.php" method="post" id="form">
            <div  class="row col-sm-12">
                <div id="select-container-<?php echo $value ?>" class="col-sm-6 form-group">
                    <h4><span class="label label-success"><?php echo $rows_reg['first_name'] ?></span></h4> 
                    <select class="form-control <?php echo $unisid; ?>" id="select-name" name="role" >
                        <?php  $querys="SELECT id,type FROM user_types WHERE id='$rows_reg[2]'";
                        $results=mysqli_query($connection, $querys); 
                        while($rows_user_types = mysqli_fetch_array($results)) {  ?>
                            <option><?php echo $rows_user_types[1]; ?></option><?php
                        } 
                        ?>
                         <?php  $querys="SELECT id,type FROM user_types";
                        $results=mysqli_query($connection, $querys); 
                        while($rows_user_types = mysqli_fetch_array($results)) { 
                            if($rows_user_types[0] !== $rows_reg[2])
                            { ?>
                                <option><?php echo $rows_user_types[1]; ?></option><?php
                            }
                        } 
                        ?>
                    </select>
                </div>
                <div id="button-container-<?php echo $value ?>" class="col-sm-3 form-group button-container">
                    <button  type="button" data-count="<?php echo $value ?>" class="btn btn-sm btn-info role-change-submit" name="submit" value="<?php echo $rows_reg[0];?>">Update</button>
                </div>
                <div class="col-sm-3" id="result"></div>
            </div>
        </form>   
        <?php  
        $value++;    
    }//while loop ending
        ?> </div>
<?php
}//if ending
else {
        session_destroy();
        header("Location: login.php");
    }
require 'footer.php';
?>