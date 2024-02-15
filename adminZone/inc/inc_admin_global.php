<?
session_start();
require_once 'adminConfig.php';
require_once '../inc/modules/database/db_connect.php';
include_once 'modules/site_identity/mod_site_name.php';
require_once 'modules/site_identity/inc_admin_nav.php';
require_once 'modules/auth/inc_logged_role.php';
require_once 'modules/user_interactions/mod_message.php';
require_once 'modules/user_modify/inc_get_users.php';
require_once 'modules/user_modify/inc_user_modify.php';

if(isLogged() && verifyUserRole($_SESSION["user_email"],$_SESSION["user_nickname"]) >= MINIMUM_ROLE){
    //Do nothing
}else{
    addMessage("Error, acceso no autorizado.",1);
    //header("Location: ../index.php");
}
