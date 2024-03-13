<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

if(isset($_GET["id"])){
    $product_id = $_GET["id"];
    $product = getProduct($product_id);
}else{
    $product = null;
}
if(isset($_GET["addToCart"])){
    addToCart($_GET["addToCart"],1);
    header("Location: product.php?id=".$_GET["addToCart"]);
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
    <link rel="stylesheet" href="inc/styles/product_page.css">
    <script src="inc/modules/store/js/inc_page_update.js"></script>
</head>
<body>
<!-- Adding navbar -->
<? require_once("inc/sections/nav_bar.php"); ?>
<? handleMessage() ?>
<? require_once("inc/sections/product_page.php"); ?>
</body>
</html>