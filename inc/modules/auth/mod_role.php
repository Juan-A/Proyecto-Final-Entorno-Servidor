<?
require_once("inc/modules/inc_global.php");

//Verifica si el usuario es administrador para mostrar el acceso a la zona de administración
function isAdmin($email, $user, $expectedRole)
{

    $query = "SELECT user_role FROM db_users WHERE user_nickname = :user AND user_email = :user_email";

    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":user", $user);
    $preQuery->bindParam(":user_email", $email);
    if ($preQuery->execute() && $preQuery->rowCount() >= 1) {

        $userData = $preQuery->fetch();
        if ($userData["user_role"] >= $expectedRole) {
            return true;
        }
    }
    return false;
}
