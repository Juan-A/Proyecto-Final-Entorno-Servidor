<?
require_once("inc/inc_admin_global.php");
function getAllProducts()
{
    $query = "SELECT * FROM db_products";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
function getProduct($prod_id)
{
    $query = "SELECT * FROM db_products WHERE var_id = :prod_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":prod_id", $cat_id);
    $preQuery->execute();
    if ($preQuery->rowCount() == 1) {
        return $preQuery->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    return false;
}/* 
function getCategoryName($cat_id)
{
    $query = "SELECT var_category_name FROM db_shop_categories WHERE var_code = :cat_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":cat_id", $cat_id);
    $preQuery->execute();
    if ($preQuery->rowCount() == 1) {
        return $preQuery->fetch()[0];
    }
    return false;
} */
function fillProductCategorySelection($prod_id)
{
    $thereIsParent = false;
    foreach (getAllCategories() as $category) {
        $cat_code = $category["var_code"];
        $cat_name = $category["var_category_name"];
        $isParent = (isProductCategory($cat_code,$prod_id)) ? "selected" : "";

        if ($_GET["id"] != $cat_code) {
?>
            <option <?= $isParent ?> value=<?= $cat_code ?>><?= $cat_name ?></option>
<?
            if ($isParent == "selected") {
                $thereIsParent = true;
            }
        }
    }
    if (!$thereIsParent) {
        echo "<option selected value='null'>-Sin categoria-</option>";
    } else {
        echo "<option value='-1'>-Deshacer relación-</option>";
    }
}
