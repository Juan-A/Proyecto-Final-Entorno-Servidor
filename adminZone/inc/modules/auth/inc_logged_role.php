<?
require_once("inc/inc_admin_global.php");
//Función para comprobar si el usuario está logueado
function isLogged()
{
    if (isset($_SESSION["user_email"])) {
        if ($_SESSION["logged_in"] == true) {
            return true;
        }
    }
    return false;
}

//Verificar el rol del usuario (lo devuelve si existe, sino devuelve false)
function verifyUserRole($email, $user)
{

    $query = "SELECT user_role FROM db_users WHERE user_nickname = :user AND user_email = :user_email";

    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":user", $user);
    $preQuery->bindParam(":user_email", $email);
    if ($preQuery->execute() && $preQuery->rowCount() >= 1) {

        $userData = $preQuery->fetch();
        return $userData["user_role"];
    }
    return false;
}
