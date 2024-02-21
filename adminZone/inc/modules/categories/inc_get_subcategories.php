<?
function getSubcategories($cat_id){
    $query = "SELECT * FROM db_shop_categories WHERE var_is_subcategory = 1 AND var_parent_category = :parent";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":parent",$cat_id);
    $preQuery->execute();    
    if($preQuery->rowCount() >= 1){
        return $preQuery->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    return false;
}