<?
include_once("inc/modules/inc_global.php");
// Obtiene todos los productos.
function getAllProducts(){
    $query = "SELECT * FROM db_products";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
// Obtiene los productos de una categoría.
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
// Obtiene la ruta de la imagen de un producto.
function productImage($product){
    return "uploads/product_images/".$product["var_product_image"];
}
// Imprime la ruta de la imagen de un producto.
function imageUrl($imageName){
    echo "uploads/product_images/".$imageName;
}
// Obtiene un producto por su ID.
function getProduct($prod_id){
    $query = "SELECT * FROM db_products WHERE var_id = :id ";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":id",$prod_id);
    $preQuery->execute();
    return $preQuery->fetchAll(PDO::FETCH_ASSOC)[0];
}

// Obtiene si un producto es virtual o no.
function isVirtual($is_virtual){
    $virtual = ($is_virtual == '1') ? true : false;
    if($virtual){
        echo "<span class='isVirtual'><i class='bx bx-cloud'></i> Producto virtual</span>";
    }else{
        echo "<span class='notVirtual'><i class='bx bxs-hand' ></i> Producto físico</span>";
    }
}