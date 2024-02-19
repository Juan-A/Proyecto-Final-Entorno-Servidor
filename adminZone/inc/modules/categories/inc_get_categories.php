<?
require_once("inc/inc_admin_global.php");
function getAllCategories()
{
    $query = "SELECT * FROM db_shop_categories";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
function getCategory($cat_id){
    $query = "SELECT * FROM db_shop_categories WHERE var_code = :cat_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":cat_id",$cat_id);
    $preQuery->execute();    
    if($preQuery->rowCount() == 1){
        return $preQuery->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    return false;
}

