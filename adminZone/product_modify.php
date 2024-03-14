<?
//Página de modificación de productos
require_once 'inc/inc_admin_global.php';

// Si recibe un POST, modifica el producto
/*
Recibe:
- id
- name
- description
- image
- price
- vat
- virtual
- parent
- category
- stock 
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prodData = [];
    $id = $_POST["id"];
    $haveCategory = false;
    $isVirtual = false;
    $isSub = false;
    // Si el valor de categoria es -1, entonces no tiene categoría
    if ($_POST["category"] != "-1") {
        $category = $_POST["category"];
    } else {
        $category = null;
    }
    // Si el valor de virtual es 1...
    if ($_POST["virtual"] == "1") {
        $isVirtual = true;
        $virtual = $_POST["virtual"];
    } else {
        $virtual = 0;
    }
    // Si el valor de parent es -1, entonces no tiene categoría.
    if ($_POST["parent"] != "-1") {
        $isSub = true;
        $parent = $_POST["parent"];
    } else {
        $isSub = false;
        $parent = null;
    }
    //Si se ha elegido una imagen, la sube (si no, se queda con la que tenía)
    if ($_FILES["image"]["size"] != 0) {
        $image = uploadProductImage($_FILES["image"]);
    } else {
        $image = getProduct($id)["var_product_image"];
    }
    // Agrego los datos al array
    array_push($prodData, $_POST["name"], $_POST["description"], $image, $_POST["price"], $_POST["vat"], $isSub, $parent, $isVirtual, $category, $_POST["stock"]);
    try {
        // Llamo a la función para modificar el producto
        modifyProduct($prodData, $id);
    } catch (PDOException $e) {
        addMessage("Hubo un error al modificar el producto: " . $e->getMessage(), 1);
        header("Location: product_modify.php?id=$id");
        exit();
    }
    addMessage("Producto modificado correctamente", 0);
    header("Location: product_modify.php?id=$id");
    exit();
}
// Si recibe un GET...
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //Si get tiene deleteImage y es 1, entonces borra la imagen (siempre que le den un id)
    if (isset($_GET["deleteImage"]) && $_GET["deleteImage"] == '1') {
        deleteImage($_GET["id"]);
    }
    $prod_id = $_GET["id"];
    $prod_data = getProduct($prod_id);
    if (!$prod_data) {
        addMessage("Error, el producto indicado no existe.", 1);
        header("Location: product_management.php");
        exit();
    }
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
        <? include_once('inc/sections/modify_product.php'); ?>
        <br>
        <h2 style="text-align: center;">Variantes del producto</h2>
        <? include_once('inc/sections/product_child_listing.php'); ?>
    </main>
    <? // require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>