<?
//Página de información y formulario del pedido
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

//Si el usuario no está logueado, lo redirige al carrito
if(!isLogged()){
    addMessage("Debes de estar registrado para hacer pedidos.",1);
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?=siteName()?></title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/check_order.css">
    <script defer src="inc/modules/store/js/inc_page_update.js"></script>
    <script defer src="inc/modules/site_identity/message_dissapear.js"></script>

</head>
<body>
<? require_once("inc/sections/nav_bar.php"); ?>
<? handleMessage() ?>
<? require_once("inc/sections/check_order.php"); ?>
<? require_once("inc/sections/footer.php"); ?>
</body>
</html>