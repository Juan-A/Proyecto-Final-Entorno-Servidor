<?
function getSubcategories($cat_id){
    $query = "SELECT * FROM db_shop_categories WHERE var_is_subcategory = 1 AND var_parent_category = :parent";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":parent",$cat_id);
    $preQuery->execute();    
    if($preQuery->rowCount() >= 1){
        return $preQuery->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}
function isParent($subcat_id,$parent_id){
    $query = "SELECT var_code,var_category_name FROM db_shop_categories WHERE var_code = :subcat AND var_parent_category = :parent_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":subcat",$subcat_id);
    $preQuery->bindParam("parent_id",$parent_id);
    $preQuery->execute();
    if($preQuery->rowCount() >= 1){
        return true;
    }else{
        return false;
    }
}