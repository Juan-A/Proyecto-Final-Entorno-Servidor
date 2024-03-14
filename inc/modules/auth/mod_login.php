<?php

require_once("inc/modules/inc_global.php");

//Funcion para loguear al usuario, recibe el password encriptado.
function validateLogin($user, $password)
{
    $query = "SELECT user_id,user_nickname,user_email,user_role,user_name,user_surname,user_password FROM db_users WHERE user_nickname = :user OR user_email = :user";

    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":user", strtolower($user));

    if ($preQuery->execute() && $preQuery->rowCount() >= 1) {
        $userData = $preQuery->fetch();
        if (password_verify($password, $userData["user_password"])) {
            $_SESSION["user_role"] = $userData["user_role"];
            $_SESSION["user_id"] = $userData["user_id"];
            $_SESSION["user_name"] = $userData["user_name"];
            $_SESSION["user_surname"] = $userData["user_surname"];
            $_SESSION["user_email"] = $userData["user_email"];
            $_SESSION["user_nickname"] = $userData["user_nickname"];
            $_SESSION["logged_in"] = true;
            return true;
        }
    }
    // Si no ha introducido bien el usuario o la contraseña...
    return false;
}
//Función para comprobar si el usuario está logueado
function isLogged()
{
    if (isset($_SESSION["user_email"])) {
        if ($_SESSION["logged_in"] == true) {
            return true;
        }
        return false;
    }
    return false;
}
