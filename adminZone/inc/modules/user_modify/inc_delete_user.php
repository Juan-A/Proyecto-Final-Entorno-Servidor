<?
require_once("inc/inc_admin_global.php");

function deleteUser($user_id)
{
    $query = "DELETE FROM db_users	WHERE user_id=:user_id;";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":user_id", $user_id);
    if (!$preQuery->execute()) {
        return false;
    }
    return true;
}
