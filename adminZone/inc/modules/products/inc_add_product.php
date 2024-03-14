<?
/*
Funcion para añadir un producto a la base de datos
con un array de 10 elementos:
    0 => Nombre del producto
    1 => Descripción del producto
    2 => Imagen del producto
    3 => Precio del producto
    4 => IVA del producto
    5 => Si es variante o no
    6 => Código del producto padre (si es variante)
    7 => Si es virtual o no
    8 => Código de la categoría del producto
    9 => Stock del producto
    Ajusto algunos valores para que se adapten a la base de datos.
*/
function addProduct($input)
{
    $query = "INSERT INTO `db_products` (`var_id`, `var_product_name`, `var_product_description`, `var_product_image`, `var_product_price`, `var_product_vat`, `var_product_is_variant`, `var_parent_product`, `var_is_virtual`, `var_product_category`, `var_product_stock`) VALUES
             (NULL, :prod_name, :prod_desc, :prod_img, :prod_price, :prod_vat, :is_variant, :prod_parent, :prod_virtual, :prod_cat, :prod_stock);";
    $preQuery = db()->prepare($query);

    $preQuery->bindValue(":prod_name", $input[0], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_desc", $input[1], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_img", $input[2], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_price", $input[3], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_vat", $input[4], PDO::PARAM_STR);
    $preQuery->bindValue(":is_variant", $input[5], PDO::PARAM_INT);
    $preQuery->bindValue(":prod_virtual", $input[7], PDO::PARAM_INT);
    $preQuery->bindValue(":prod_stock", $input[9], PDO::PARAM_INT);

    if ($input[6] == "null") {
        $preQuery->bindValue(":prod_parent", null, PDO::PARAM_NULL);
    } else {
        $preQuery->bindValue(":prod_parent", $input[6], PDO::PARAM_INT);
    }
    if($input[8] == "null"){
        $preQuery->bindValue(":prod_cat", null, PDO::PARAM_NULL);
    }else {
        $preQuery->bindValue(":prod_cat", $input[8], PDO::PARAM_INT);
    }

    if (!$preQuery->execute()) {
        return false;
    }
    return true;
}
