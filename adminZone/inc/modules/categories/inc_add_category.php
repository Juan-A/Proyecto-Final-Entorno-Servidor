<?
/*
Añade una nueva categoría a la base de datos
con un array de 4 elementos:
    0 => Nombre de la categoría
    1 => Descripción de la categoría
    2 => Si es subcategoría o no
    3 => Código de la categoría padre (si es subcategoría)
*/
function addCategory($input)
{
    $query = "INSERT INTO `db_shop_categories` (`var_code`, `var_category_name`, `var_category_description`, `var_is_subcategory`, `var_parent_category`) 
              VALUES (NULL, :cat_name, :cat_desc, :is_subcat, :parent_cat)";
    $preQuery = db()->prepare($query);


    $preQuery->bindParam(":cat_name", $input[0]);
    $preQuery->bindParam(":cat_desc", $input[1]);
    $preQuery->bindParam(":is_subcat", $input[2],PDO::PARAM_BOOL);
    if ($input[3] == "null") {
        $preQuery->bindParam(":parent_cat", null,PDO::PARAM_NULL);
    } else {
        $preQuery->bindParam(":parent_cat", $input[3]);
    }

    if (!$preQuery->execute()) {
        return false;
    }
    return true;
}
