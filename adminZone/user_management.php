<?
require_once 'inc/inc_admin_global.php';
if (isset($_GET["deleteUser"])) {
    $userID = $_GET["deleteUser"];
    deleteUser($userID);
    addMessage("Usuario eliminado correctamente.", 0);
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
    <? require_once("inc/sections/users_listing.php"); ?>
    <!--Footer-->
    <? // require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>