<?
//Página de registro
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

//Si recibimos los datos por POST...
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST["username"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    //Si alguno de los campos está vacío, mostramos un mensaje de error.
    if(empty($user) || empty($name) || empty($surname) || empty($mail) || empty($password)){
        addMessage("Error al registrar el usuario, revise que todos los campos han sido rellenados.",1);
    }else{
        //Encriptamos la contraseña
        $password = encryptPassword($_POST["password"]);
        //Metemos los datos en un array y los enviamos a la función de registro.
        $data = [$mail,$password,$user,0,$name,$surname];
        try{
            register($data);
            header("Location: login.php");
        }catch(PDOException $e){
            //Si el usuario ya existe, mostramos un mensaje de error.
            addMessage("EL usuario/mail ya existe, inténtelo con otro.",1);
        }
    }
    
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?></title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/auth_form_styles.css">
    <script defer src="inc/modules/auth/registerFunctions.js"></script>
    <script defer src="inc/modules/site_identity/message_dissapear.js"></script>
</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <? handleMessage(); ?>
    <!--Register box-->
    <? require_once("inc/sections/register_form.php"); ?>
    <!--Footer-->
    <? require_once("inc/sections/footer.php"); ?>
</body>

</html>