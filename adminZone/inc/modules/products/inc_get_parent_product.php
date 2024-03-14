<?
// Funcion que devuelve si un producto es padre o no de un producto dados sus id
function isProductParent($parent,$product_id){
    $query = "SELECT var_id FROM db_products WHERE var_product_is_variant = 1 AND var_parent_product = :parent AND var_id = :prod_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":parent",$parent);
    $preQuery->bindParam(":prod_id",$product_id);
    $preQuery->execute();
 
    if($preQuery->rowCount() >= 1){
        return true;

    }else{
        return false;
    }
}