<main>
    <div class="authContainer">
        <form action="register.php" method="POST">
            <fieldset>
                <legend>Datos de acceso</legend>
                <div class="authFields">
                    <span>Usuario / nick:</span>
                    <input type="text" name="username" id="username">
                    <span>Nombre:</span>
                    <input type="text" name="name" id="name">
                    <span>Apellidos:</span>
                    <input type="text" name="surname" id="surname">
                    <span>Correo electronico:</span>
                    <input type="text" name="mail" id="mail">
                    <span>Contraseña:</span>
                    <input type="password" name="password" id="password">
                    <span>Confirmación de contraseña:</span>
                    <input type="password" name="passwordConfirm" id="passwordConfirm">
                    <span class="errorMessage" hidden></span>
                    <button type="submit" id="regButton" class="formBtn">Registrarse</button>
                </div>
            </fieldset>
        </form>
    </div>
</main>