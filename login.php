<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(validateLogin($_POST["username"],$_POST["password"])){
        header("Location: ./index.php");
    }else{
        addMessage("Error, la contraseña o usuario son incorrecto(s).",1);
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
</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <!-- Handles the current message, if exists -->
    <div class="message"><?=handleMessage()?></div>
    <!--Login box-->
    <main>
        <div class="authContainer">
            <form action="login.php" method="POST">
                <fieldset>
                    <legend>Datos de acceso</legend>
                    <div class="authFields">
                            <span>Usuario / Correo:</span>
                            <input type="text" name="username">
                            <span>Contraseña:</span>
                            <input type="password" name="password">
                            <button type="submit" class="formBtn">Acceder</button>
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