<?
require_once("inc/inc_admin_global.php");
function getAllUsers()
{
    $query = "SELECT * FROM db_users";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
function getUser($user_id){
    $query = "SELECT * FROM db_users WHERE user_id = :user_id";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":user_id",$user_id);
    $preQuery->execute();    
    if($preQuery->rowCount() == 1){
        return $preQuery->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    return false;
}
function cleanUserRow($userRow){
    array_splice($userRow,2,1);
    return $userRow;
}
