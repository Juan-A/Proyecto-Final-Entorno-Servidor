<?
require_once("inc/inc_admin_global.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?=siteName()?> - Admin Panel</title>
    <link rel="stylesheet" href="inc/styles/main_style_admin.css">
</head>
<body>

<!-- Adding navbar -->
<? require_once("inc/sections/nav_bar.php"); ?>
<? handleMessage() ?>
<div class="admin-content" style="text-align: center;">
    <h1>Bienvenido al panel de administración</h1>
    <p>Productos totales: <?= getProductCount() ?></p>
    <p>Categorias totales: <?= getCategoryCount() ?></p>
    <p>Usuarios totales: <?= getUserCount() ?></p>
    
</div>
</body>
</html>