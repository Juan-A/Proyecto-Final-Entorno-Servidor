<?
/*
Funcion para modificar una categoria
con un array de 4 elementos:
    0 => Nombre de la categoría
    1 => Descripción de la categoría
    2 => Si es subcategoría o no
    3 => Código de la categoría padre (si es subcategoría)
*/
function modifyCategory($input, $catID)
{
    $query = "UPDATE db_shop_categories
        SET var_category_name=:cat_name,var_category_description=:cat_desc,var_is_subcategory=:is_subcat,var_parent_category=:parent_cat WHERE var_code=:cat_code;
    ";
    $preQuery = db()->prepare($query);


    $preQuery->bindParam(":cat_code", $catID);
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
