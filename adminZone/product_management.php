<?
// Página de administración de productos
require_once 'inc/inc_admin_global.php';
//Si recibe el parámetro deleteProduct, elimina el producto con ese id
if (isset($_GET["deleteProduct"])) {
    $productID = $_GET["deleteProduct"];
    deleteProduct($productID);
    addMessage("Producto eliminado correctamente.", 0);
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
    <!--Register box-->
    <div style="margin-top: 20px;text-align: center">
    <a href="create_product.php" class="buttonOne">Crear producto</a>
    </div>
    <? require_once("inc/sections/products_listing.php"); ?>
    <!--Footer-->
    <?// require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>