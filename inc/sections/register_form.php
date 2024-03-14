<!-- Formulario de registro de usuarios -->
<main>
    <div class="authContainer">
        <form action="register.php" method="POST">
            <fieldset>
                <legend>Datos de acceso</legend>
                <div class="authFieldsContainer">
                    <span>Usuario / nick:</span>
                    <input type="text" name="username" id="username" required>
                    <span>Nombre:</span>
                    <input type="text" name="name" id="name" required>
                    <span>Apellidos:</span>
                    <input type="text" name="surname" id="surname" required>
                    <span>Correo electronico:</span>
                    <input type="text" name="mail" id="mail" required>
                    <span>Contraseña:</span>
                    <input type="password" name="password" id="password" required>
                    <span>Confirmación de contraseña:</span>
                    <input type="password" name="passwordConfirm" id="passwordConfirm" required>
                    <span class="errorMessage" hidden></span>
                    <button type="submit" id="regButton" class="formBtn">Registrarse</button>
                </div>
            </fieldset>
        </form>
    </div>
</main>