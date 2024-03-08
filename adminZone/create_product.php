<?
require_once 'inc/inc_admin_global.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prodData = [];
    $haveCategory = false;
    $isVirtual = false;
    $isSub = false;

    if ($_POST["category"] != "-1") {
        $category = $_POST["category"];
    } else {
        $category = null;
    }

    if ($_POST["virtual"] == "1") {
        $isVirtual = true;
        $virtual = $_POST["virtual"];
    } else {
        $virtual = 0;
    }

    if ($_POST["parent"] != "-1") {
        $isSub = true;
        $parent = $_POST["parent"];
    } else {
        $isSub = false;
        $parent = null;
    }
    if ($_FILES["image"]["size"] != 0) {
        $image = uploadProductImage($_FILES["image"]);
    } else {
        $image = getProduct($id)["var_product_image"];
    }
    array_push($prodData, $_POST["name"], $_POST["description"], $image, $_POST["price"], $_POST["vat"], $isSub, $parent, $isVirtual, $category, $_POST["stock"]);
    try {
        addProduct($prodData);
    } catch (PDOException $e) {
        addMessage("Hubo un error al crear el producto: " . $e->getMessage(), 1);
        header("Location: product_management.php");
        exit();
    }
    addMessage("Producto creado correctamente", 0);
    header("Location: product_management.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?> - Product Management</title>
    <link rel="stylesheet" href="inc/styles/main_style_admin.css">
    <link rel="stylesheet" href="inc/styles/user_modify_form.css">
    <script defer src="inc/modules/categories/js/is_child.js"></script>

</head>

<body>

    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <main>
        <? handleMessage() ?>
        <? include_once('inc/sections/add_product.php'); ?>

    </main>
    <? // require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>