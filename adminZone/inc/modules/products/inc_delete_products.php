<?
require_once("inc/inc_admin_global.php");

function deleteProduct($prod_id)
{
    $query = "DELETE FROM db_products WHERE var_id=:prod_id;";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":prod_id", $prod_id);
    if (!$preQuery->execute()) {
        return false;
    }
    return true;
}
