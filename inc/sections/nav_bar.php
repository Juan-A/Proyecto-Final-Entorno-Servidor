<nav class="main">
    <div class="logoHeader">
        <?= insert_logo() ?>
    </div>
    <? insertNavBarMenu(); ?>
    <?
    if (isLogged()) {
        if (isAdmin($_SESSION["user_email"], $_SESSION["user_nickname"], 2)) {
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