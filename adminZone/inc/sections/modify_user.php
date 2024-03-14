<!-- Formulario de modificación de usuario -->
<main>
    <div class="fieldsContainer">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <span>Usuario / nick:</span>
            <input type="text" name="username" id="username" value="<?=$user_data["user_nickname"]?>">
            <span>Rol:</span>
            <input type="text" name="role" id="role" value="<?=$user_data["user_role"]?>">
            <span>Nombre:</span>
            <input type="text" name="name" id="name" value="<?=$user_data["user_name"]?>" >
            <span>Apellidos:</span>
            <input type="text" name="surname" id="surname" value="<?=$user_data["user_surname"]?>">
            <span>Correo electronico:</span>
            <input type="text" name="mail" id="mail" value="<?=$user_data["user_email"]?>">
            <span>Contraseña:</span>
            <input type="password" name="password" id="password" placeholder="*********">
            <input type="hidden" name="id" value="<?=$user_data["user_id"]?>">
            <button type="submit" id="regButton" class="formBtn">Modificar</button>
        </form>
    </div>
</main>