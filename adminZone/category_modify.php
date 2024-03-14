<?
// Página de modificación de categorías
require_once 'inc/inc_admin_global.php';

// Si recibo un POST con  con el formulario de modificación de categoría
// entonces modifico la categoría (se llama a sí misma)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catData = [];
    $id = $_POST["id"];
    $isSub = false;
    // Si el valor de parent es distinto de -1, entonces es una subcategoría
    if ($_POST["parent"] != "-1") {
        $isSub = true;
        $parent = $_POST["parent"];
    } else{
        $parent = null;
    }
    // Agrego los datos al array
    array_push($catData, $_POST["name"], $_POST["description"], $isSub, $parent);
    try {
        // Llamo a la función para modificar la categoría
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
// Si recibo un GET con un id de categoría, entonces muestro el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cat_id = $_GET["id"];
    $cat_data = getCategory($cat_id);
    if (!$cat_data) {
        addMessage("Error, la categoría indicada no existe.", 1);
        header("Location: categories_management.php");
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
        <? include_once('inc/sections/modify_category.php'); ?>
        <br>
        <h2 style="text-align: center;">Subcategorías</h2>
        <? include_once('inc/sections/subcategories_listing.php'); ?>
    </main>
    <? // require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>