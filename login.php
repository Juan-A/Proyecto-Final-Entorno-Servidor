<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?></title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/login_style.css">
</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <!--Login box-->
    <main>
        <div class="loginContainer">
            <form action="login.php" method="POST">
                <fieldset>
                    <legend>Datos de acceso</legend>
                    <div class="loginFields">
                            <span>Usuario / Correo:</span>
                            <input type="text" name="username">
                            <span>Contraseña:</span>
                            <input type="password" name="password">
                            <button type="submit">Acceder</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </main>
    <? require_once("inc/sections/footer.php"); ?>
</body>

</html>