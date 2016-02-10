<?php
require 'header.php';
require 'dbinfo.php';
session_start();
if($_SESSION['id'] && $_SESSION['admin']) {
    $query="SELECT id,user_name,user_type_id FROM reg WHERE admin='0'";
    $result=mysqli_query($connection, $query);
    while($rows_reg = mysqli_fetch_array($result)) {
        ?>
        <div class="well">
            <form class='table form' action="rolepost.php" method="post" id="form">
                <table>
                    <div class="row">
                        <tr>
                            <td>
                                <div class="col-sm-1 form-group">
                                    <label>id</label>
                                    <input type="text" class="id"  name="id" id="id" value="<?php echo $rows_reg[0]; ?>">
                                </div>
                            </td>
                            <td>
                                <label>role</label>
                                 <select class="form-control role_select_change" name="role" id="role_select">
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
                            </td>
                            <tb>    </tb>
                            <td>     </td>   
                            <td class="align-right"> 
                               <button type="button" class="btn btn-sm btn-info" name="submit" id="role_submit" value="update">Update</button>
                            </td>
                        </tr>
                    </div>
                </table>
            </form>
         </div>   
        <?php
        $table_counter++;
    }
?>
<?php
}
else {
        session_destroy();
        header("Location: login.php");
    }
require 'footer.php';
?>