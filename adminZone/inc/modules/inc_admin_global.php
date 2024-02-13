<?
session_start();
require_once '../inc/modules/database/db_connect.php';
include_once 'site_identity/mod_site_name.php';
require_once 'site_identity/inc_admin_nav.php';
require_once 'auth/inc_logged_role.php';
require_once 'user_interactions/mod_message.php';
if(isLogged()){
    //Do nothing
}else{
    addMessage("Error, acceso no autorizado.",1);
    header("Location: ../index.php");
}
