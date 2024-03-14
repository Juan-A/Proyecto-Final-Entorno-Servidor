<?
require_once("inc/inc_admin_global.php");
//Función para eliminar una categoría con su id
function deleteCategory($cat_id)
{
    $query = "DELETE FROM db_shop_categories WHERE var_code=:cat_id;";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":cat_id", $cat_id,PDO::PARAM_INT);
    if (!$preQuery->execute()) {
        return false;
    }
    return true;
}
