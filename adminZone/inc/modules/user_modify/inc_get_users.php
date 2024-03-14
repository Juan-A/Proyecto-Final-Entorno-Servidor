<?
require_once("inc/inc_admin_global.php");
// Función para obtener todos los usuarios
function getAllUsers()
{
    $query = "SELECT * FROM db_users";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    
    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
// Función para obtener un usuario con su id
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
// Funcion para devolver una tupla de usuario sin la contraseña
function cleanUserRow($userRow){
    array_splice($userRow,2,1);
    return $userRow;
}
// Función para obtener el número de usuarios
function getUserCount(){
    $query = "SELECT COUNT(*) FROM db_users";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    return $preQuery->fetchColumn();
}