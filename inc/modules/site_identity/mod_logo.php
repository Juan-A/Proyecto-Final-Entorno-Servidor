<?
include_once("inc/modules/inc_global.php");
//Función para insertar el logo directamente desde la base de datos
function insert_logo()
{
    $queryImg = "SELECT var_param_name, var_param_value FROM db_site_identity
    WHERE var_name='main_logo_url'";
    $queryWidth = "SELECT var_param_name, var_param_value FROM db_site_identity
    WHERE var_name='main_logo_width'";
    $preQueryImg = db()->prepare($queryImg);
    $preQueryWidth = db()->prepare($queryWidth);
    $preQueryImg->execute();
    $preQueryWidth->execute();
    $imgURL = $preQueryImg->fetch()[1];
    $imgWidth = $preQueryWidth->fetch()[1];
    echo "<img src='$imgURL' width = '$imgWidth'>";
}
