<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(validateLogin($_POST["username"],$_POST["password"])){
        $name = $_SESSION["user_name"];
        addMessage("Bienvenido $name! Te has logueado correctamente.",0);
        header("Location: ./index.php");
        exit();
    }else{
        addMessage("Los datos introducidos son incorrectos.",1);
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
    <script defer src="inc/modules/site_identity/message_dissapear.js"></script>
</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <!-- Handles the current message, if exists -->
    <? handleMessage() ?>
    <!--Login box-->
    <main>
        <div class="authContainer">
            <form action="login.php" method="POST" class="loginForm">
                <fieldset>
                    <legend>Datos de acceso</legend>
                    <div class="authFieldsContainer">
                            <span>Usuario / Correo:</span>
                            <input type="text" name="username">
                            <span>Contraseña:</span>
                            <input type="password" name="password">
                            <br>
                            <a href="login.php" onclick="loginSubmit()" class="buttonOne">Acceder</a>
                            <button type="submit" hidden></button>
                    </div>
                    <br>
                    <a href="./register.php" class="buttonOne" id="nonRegisteredYet"> <i class='bx bx-user-plus bx-tada-hover' ></i> ¿Aún sin usuario?</a>
                </fieldset>
            </form>
        </div>
    </main>
    <? require_once("inc/sections/footer.php"); ?>
</body>

</html>