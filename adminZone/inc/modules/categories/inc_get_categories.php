<?
require_once("inc/inc_admin_global.php");
//Función para obtener todas las categorías
function getAllCategories()
{
    $query = "SELECT * FROM db_shop_categories";
    $preQuery = db()->prepare($query);
    $preQuery->execute();

    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
//Función para obtener todas las subcategorías dada una categoría
function getCategory($cat_id)
{
    $query = "SELECT * FROM db_shop_categories WHERE var_code = :cat_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":cat_id", $cat_id);
    $preQuery->execute();
    if ($preQuery->rowCount() == 1) {
        return $preQuery->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    return false;
}
//Función para obtener el número de categorías
function getCategoryCount()
{
    $query = "SELECT COUNT(*) FROM db_shop_categories";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    return $preQuery->fetchColumn();
}
//Función para obtener el nombre de una categoría dada su id
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
}
/*
Función para crear un select con todas las categorías
y seleccionar la categoría padre de una subcategoría (si la tiene)
También puede deshacer la relación con la categoría padre.
*/
function fillCategorySelect($subcatID)
{
    $thereIsParent = false;
    foreach (getAllCategories() as $category) {
        $code = $category["var_code"];
        $cat_name = $category["var_category_name"];
        if($subcatID != -1){
            $isParent = (isParent($subcatID, $code)) ? "selected" : "";
        }else{
            $isParent = "";
        }

        if ($_GET["id"] != $code) {
?>
            <option <?= $isParent ?> value=<?= $code ?>><?= $cat_name ?></option>
<?
            if ($isParent == "selected") {
                $thereIsParent = true;
            }
        }
    }
    if (!$thereIsParent) {
        echo "<option selected value='null'>-No tiene categoria superior-</option>";
    } else {
        echo "<option value='-1'>-Deshacer relación-</option>";
    }
}
