<?
include_once("inc/modules/inc_global.php");

function getAllProducts(){
    $query = "SELECT * FROM db_products";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
function getProductsFromCategory($cat_id){
    $query = "SELECT * FROM db_products WHERE var_product_category = :cat ";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":cat",$cat_id);
    $preQuery->execute();
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
function productImage($product){
    return "uploads/product_images/".$product["var_product_image"];
}
function getProduct($prod_id){
    $query = "SELECT * FROM db_products WHERE var_id = :id ";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":id",$prod_id);
    $preQuery->execute();
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}