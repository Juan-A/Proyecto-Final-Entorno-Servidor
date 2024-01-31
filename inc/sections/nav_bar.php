<nav class="main">
    <div class="logoHeader">
        <?= insert_logo() ?>
    </div>
    <? insertNavBarMenu(); ?>
    <div>
        <?
        if (isLogged()) {
        ?>
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