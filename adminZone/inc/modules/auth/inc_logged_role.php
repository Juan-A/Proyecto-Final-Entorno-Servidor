<?
//This file includes functions to check if an user is logged in and check for
// the authorized role.
require_once("inc/inc_admin_global.php");

function isLogged()
{
    if (isset($_SESSION["user_email"])) {
        if ($_SESSION["logged_in"] == true) {
            return true;
        }
    }
    return false;
}

//Verifies if an user have rights to show the Admin Panel item in the nav's menu.
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
