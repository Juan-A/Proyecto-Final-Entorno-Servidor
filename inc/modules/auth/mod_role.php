<?
require_once("inc/modules/inc_global.php");

//Verifies if an user have rights to show the Admin Panel item in the nav's menu.
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
