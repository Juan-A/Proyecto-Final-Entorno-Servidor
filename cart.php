<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?=siteName()?> - Carrito</title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/cart_style.css">
    <script src="inc/modules/store/js/inc_page_update.js"></script>
</head>
<body>
<!-- Adding navbar -->
<? require_once("inc/sections/nav_bar.php"); ?>
<? handleMessage() ?>
<? require_once("inc/sections/cart_main.php"); ?>
</body>
</html>