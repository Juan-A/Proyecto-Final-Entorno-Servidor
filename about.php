<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");
// Página de información sobre la tienda
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?=siteName()?></title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/landing_styles.css">
    <script defer src="inc/modules/site_identity/message_dissapear.js"></script>
</head>
<body>
<? require_once("inc/sections/nav_bar.php"); ?>
<? handleMessage() ?>
<? require_once("inc/sections/about.php"); ?>

<? require_once("inc/sections/footer.php"); ?>

</body>

</html>