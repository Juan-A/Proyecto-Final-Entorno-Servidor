<?
require_once("inc/inc_admin_global.php");

function deleteCategory($cat_id)
{
    $query = "DELETE FROM db_shop_categories WHERE var_code=:cat_id;";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":var_code", $cat_id);
    if (!$preQuery->execute()) {
        return false;
    }
    return true;
}
