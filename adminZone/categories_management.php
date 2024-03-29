<?
// Página de administración de categorías
require_once 'inc/inc_admin_global.php';
// Si recibe un id de categoría por GET, elimina la categoría
if (isset($_GET["deleteCategory"])) {
    $cat_id = $_GET["deleteCategory"];
    try {
        deleteCategory($cat_id);
    } catch (Exception $e) {
        addMessage("Hubo un fallo al eliminar la categoria: <br> Debes eliminar todas las subcategorias correspondientes antes de continuar." . $e, 1);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?></title>
    <link rel="stylesheet" href="inc/styles/main_style_admin.css">
    <script defer src="inc/modules/user_modify/js/deleteWarning.js"></script>
</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <? handleMessage(); ?>
    <div style="margin-top: 20px;text-align: center">
        <a href="create_category.php" class="buttonOne">Crear categoria</a>
    </div>
    <? require_once("inc/sections/categories_listing.php"); ?>
    <!--Footer-->
    <? // require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>