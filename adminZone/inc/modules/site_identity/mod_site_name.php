<?
include_once("inc/modules/inc_admin_global.php");

function siteName(){
    $query = "SELECT var_param_name, var_param_value FROM db_site_identity
    WHERE var_name='main_site_name'";
    $preQuery = db()->prepare($query);

    $preQuery->execute();
    echo $preQuery ->fetch()[1];
}