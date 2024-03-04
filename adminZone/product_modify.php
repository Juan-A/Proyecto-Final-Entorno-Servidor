<?
require_once 'inc/inc_admin_global.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catData = [];
    $id = $_POST["id"];
    $isSub = false;
    if ($_POST["parent"] != "-1") {
        $isSub = true;
        $parent = $_POST["parent"];
    } else{
        $parent = null;
    }
    array_push($catData, $_POST["name"], $_POST["description"], $isSub, $parent);
    try {
        modifyCategory($catData, $id);
    } catch (PDOException $e) {
        addMessage("Hubo un error al modificar la categoria: " . $e->getMessage(), 1);
        header("Location: category_modify.php?id=$id");
        exit();
    }
    addMessage("Categoria modificada correctamente", 0);
    header("Location: category_modify.php?id=$id");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $prod_id = $_GET["id"];
    $prod_data = getProduct($prod_id);
    if (!$prod_data) {
        addMessage("Error, el producto indicado no existe.", 1);
        header("Location: product_management.php");
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?> - Category Management</title>
    <link rel="stylesheet" href="inc/styles/main_style_admin.css">
    <link rel="stylesheet" href="inc/styles/user_modify_form.css">
    <script defer src="inc/modules/categories/js/is_child.js"></script>

</head>

<body>

    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <main>
        <? handleMessage() ?>
        <? include_once('inc/sections/modify_product.php'); ?>
        <br>
        <h2 style="text-align: center;">Subcategorías</h2>
        <? include_once('inc/sections/subcategories_listing.php'); ?>
    </main>
    <? // require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>