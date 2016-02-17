<?php
session_start();
if (!(isset($_SESSION['id'])) && empty($_SESSION['id'])) {
    header('Location: login.php');
}
/**
*
*
*/
class Acl {
    public function getRoleResourcePrivilege($role_id)
    {
        include 'dbinfo.php';
        $privilegedInfo = array();
        $sql            = "SELECT res.name AS resName, action AS oName
                            FROM privileges as p
                            JOIN resources as res ON p.resources_id = res.id
                            JOIN operations as o ON p.operations_id = o.id
                            WHERE p.user_types_id = $role_id";
        $data           = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($data)) {
            $privilegedInfo['resources'][$row['resName']]                    = true;
            $privilegedInfo['operations'][$row['resName'].'-'.$row['oName']] = true;
        }
         $_SESSION['p'] = $privilegedInfo;
        return $privilegedInfo;
    }//end getRoleResourcePrivilege()
}//end class
$acl = new Acl();
$_SESSION['privilegedInfo'] = $acl->getRoleResourcePrivilege($_SESSION['role']);
function isAllowed($resource, $operation = '')
{
    $privilegesAvailable = $_SESSION['privilegedInfo']['operations'];
    $privilegeToCheck = $resource . "-" . $operation;
    //Checking if all access permission or current action access permission
    if((isset($privilegesAvailable[$resource . "-" ."all"]) &&
        (true === $privilegesAvailable[$resource . "-" ."all"])) ||
        (isset($privilegesAvailable[$privilegeToCheck]) &&
        (true === $privilegesAvailable[$privilegeToCheck]))) {
        return true;
    }
    return false;
}//end isAllowed()
//Checking access for current page
$path_parts = pathinfo($_SERVER['REQUEST_URI']);
$requestedResource = $path_parts['filename'];
$requestedAction   = isset($_SESSION['action']) ? $_SESSION['action'] : '';
if(!isAllowed($requestedResource, $requestedAction)) {
    $_SESSION['acl_message'] = 'Sorry! You do not have permission to '
       // . $requestedResource . ' ' 
    .$requestedAction;
    header('Location: home.php');
    exit;
}//ending if block
$_SESSION['action'] = 'view';
$_SESSION['acl_message'] = 'Welcome' ;
?>