<?
session_start();
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?=siteName()?></title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
</head>
<body>
<!-- Adding navbar -->
<? require_once("inc/sections/nav_bar.php"); ?>

</body>
</html>