<?
//Página del carrito
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");
//Si recibe por GET el parámetro delete, elimina el producto del carrito con el id recibido.
if (isset($_GET["delete"])) {
    deleteFromCart($_GET["delete"]);
}
//Si recibe por GET el parámetro setQuantity, establece la cantidad del producto con el id recibido.
if (isset($_GET["setQuantity"]) && isset($_GET["prod_id"])) {
    setQuantity($_GET["prod_id"], $_GET["setQuantity"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?> - Carrito</title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/cart_style.css">
    <script defer src="inc/modules/store/js/inc_page_update.js"></script>
    <script defer src="inc/modules/site_identity/message_dissapear.js"></script>
</head>

<body>
    <? require_once("inc/sections/nav_bar.php"); ?>
    <? handleMessage() ?>
    <? require_once("inc/sections/cart_main.php"); ?>
    <? require_once("inc/sections/footer.php"); ?>
</body>

</html>