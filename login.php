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
    <div id="loginContainer">
        <form action="login.php" method="POST">
        <fieldset>
            <legend>Datos de acceso</legend>
            <table>
                <tr>
                    <td>Usuario / Correo:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Acceder</button></td>
                </tr>
            </table>
        </fieldset>
        </form>
    </div>
    </main>
    <footer>
        <hr>
        <hr>
        Footer example.
    </footer>
</body>

</html>