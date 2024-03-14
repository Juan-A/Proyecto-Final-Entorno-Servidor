<?
function modifyProduct($input, $prodID)
{
    $query = "UPDATE db_products
        SET var_product_name=:prod_name,var_product_description=:prod_desc,var_product_image=:prod_img,var_product_price=:prod_price,var_product_vat=:prod_vat,var_product_is_variant=:is_variant,var_parent_product=:prod_parent,var_is_virtual=:prod_virtual,var_product_category=:prod_cat,var_product_stock=:prod_stock WHERE var_id=:prod_id;
    ";
    $preQuery = db()->prepare($query);

    $preQuery->bindValue(":prod_id", $prodID, PDO::PARAM_INT);
    $preQuery->bindValue(":prod_name", $input[0], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_desc", $input[1], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_img", $input[2], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_price", $input[3], PDO::PARAM_STR);
    $preQuery->bindValue(":prod_vat", $input[4], PDO::PARAM_STR);
    $preQuery->bindValue(":is_variant", $input[5], PDO::PARAM_BOOL);
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
