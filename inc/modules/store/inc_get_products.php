<?
include_once("inc/modules/inc_global.php");

function getAllProducts(){
    $query = "SELECT * FROM db_products";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
function getProductsFromCategory($cat_id) {
    $categories = getAllCategories();
    $products = getAllProducts();
    $subcategories = getSubcategories($cat_id, $categories);

    $cat_ids = [$cat_id];
    foreach ($subcategories as $subcat) {
        array_push($cat_ids, $subcat['var_code']);
    }

    $products_from_category = [];

    foreach ($products as $product) {
        if (in_array($product['var_product_category'], $cat_ids)) {
            array_push($products_from_category, $product);
        }
    }

    return $products_from_category;
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