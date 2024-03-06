<?
function getChildProducts($parent){
    $query = "SELECT * FROM db_products WHERE var_product_is_variant = 1 AND var_parent_product = :parent";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":parent",$parent);
    $preQuery->execute();
 
    if($preQuery->rowCount() >= 1){
        return $preQuery->fetchAll((PDO::FETCH_ASSOC));
    }else{
        return false;
    }
}