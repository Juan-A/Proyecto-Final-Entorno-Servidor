<!-- Menu de navegación -->
<?
//Cargo configuración para definir el rol mínimo para acceder al panel de administración
require_once("adminZone/adminConfig.php");
?>
<nav class="main">
    <div class="logoHeader">
        <?= insert_logo() ?>
    </div>
    <? insertNavBarMenu(); ?>
    <?
    //Si el usuario está logueado, muestra el botón de logout
    if (isLogged()) {
        //Si el usuario es administrador, muestra el botón de acceso al panel de administración
        if (isAdmin($_SESSION["user_email"], $_SESSION["user_nickname"], MINIMUM_ROLE)) {
    ?>
            <a href="adminZone/index.php" class="loginNavButton"><i class='bx bx-cog bx-spin-hover' style="font-size: 30px;"></i> Panel de Administración</a>
        <?
        }
        ?>
        <div>
            <a href="logout.php" class="loginNavButton"><i class='bx bx-exit bx-tada-hover' style="font-size: 30px;"></i> Logout</a>
        <?
    } else {
        ?>
            <a href="login.php" class="loginNavButton"><i class='bx bx-user-circle bx-tada-hover' style="font-size: 30px;"></i> Login</a>
        <?
    }
        ?>
        </div>
</nav>