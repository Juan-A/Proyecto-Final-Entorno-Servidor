<?
// Función para ver si un producto pertenece a una categoría
function isProductCategory($cat_id,$prod_id){
    $query = "SELECT var_id FROM db_products WHERE var_id = :prod_id AND var_product_category = :cat_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":cat_id",$cat_id);
    $preQuery->bindParam("prod_id",$prod_id);
    $preQuery->execute();
 
    if($preQuery->rowCount() >= 1){
        return true;

    }else{
        return false;
    }
}