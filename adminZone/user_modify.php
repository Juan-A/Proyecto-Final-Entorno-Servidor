<?
//Página de modificación de usuarios
require_once 'inc/inc_admin_global.php';
//Si recibe un POST, modifica el usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = [];
    $id = $_POST["id"];
    // Agrego los datos al array
    array_push(
        $userData,
        $_POST["mail"],
        $_POST["password"],
        $_POST["username"],
        $_POST["role"],
        $_POST["name"],
        $_POST["surname"],
        $_POST["mail"]
    );

    try {
        modify($userData, $id);
    } catch (PDOException $e) {
        addMessage("Hubo un error al modificar el usuario: " . $e->getMessage(), 1);
        header("Location: user_modify.php?id=$id");
        exit();
    }
    addMessage("Usuario modificado correctamente", 0);
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user_id = $_GET["id"];
    $user_data = getUser($user_id);
    if (!$user_data) {
        addMessage("Error, el usuario con el ID indicado no existe.", 1);
        header("Location: user_management.php");
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
    <title><?= siteName() ?> - User Management</title>
    <link rel="stylesheet" href="inc/styles/main_style_admin.css">
    <link rel="stylesheet" href="inc/styles/user_modify_form.css">

</head>

<body>

    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <? handleMessage() ?>
    <? include_once('inc/sections/modify_user.php'); ?>
    <? // require_once("inc/sections/footer.php"); 
    ?>
</body>

</html>