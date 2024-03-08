<?
require_once 'inc/inc_admin_global.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catData = [];
    $isSub = false;
    if ($_POST["parent"] != "-1") {
        $isSub = true;
        $parent = $_POST["parent"];
    } else {
        $parent = null;
    }
    array_push($catData, $_POST["name"], $_POST["description"], $isSub, $parent);
    try {
        addCategory($catData);
    } catch (PDOException $e) {
        addMessage("Hubo un error al crear la categoria: " . $e->getMessage(), 1);
        header("Location: categories_management.php");
        exit();
    }
    addMessage("Categoria creada correctamente", 0);
    header("Location: categories_management.php");
    exit();
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
    <link rel="stylesheet" href="inc/styles/user_modify_form.css">
    <script defer src="inc/modules/user_modify/js/deleteWarning.js"></script>

</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <main>
        <? handleMessage(); ?>
        <!--Register box-->
        <? require_once("inc/sections/add_category.php"); ?>
        <!--Footer-->
        <? // require_once("inc/sections/footer.php"); 
        ?>
    </main>
</body>

</html>