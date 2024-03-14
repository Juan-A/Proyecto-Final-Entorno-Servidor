<?
//Página pruncipal de la tienda.
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

//Si se ha seleccionado una categoría, se pasa como parámetro con GET
if (isset($_GET["cat"])) {
    $cat = $_GET["cat"];
} else {
    $cat = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?></title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/store_style.css">
    <script defer src="inc/modules/store/js/inc_page_update.js"></script>
    <script defer src="inc/modules/site_identity/message_dissapear.js"></script>
</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <? handleMessage() ?>
    <? require_once("inc/sections/store_main.php"); ?>
    <? require_once("inc/sections/footer.php"); ?>
</body>

</html>