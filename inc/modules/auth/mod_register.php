<?
require_once("inc/modules/inc_global.php");

function register($input){
    $query = "INSERT INTO db_users (user_email,user_password,user_nickname,user_role,user_name,user_surname) 
    VALUES (:mail,:pass,:nick,:usr_role,:usr_name,:usr_surname);";
    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":mail",$input[0]);
    $preQuery->bindParam(":pass",$input[1]);
    $preQuery->bindParam(":nick",$input[2]);
    $preQuery->bindParam(":usr_role",$input[3]);
    $preQuery->bindParam(":usr_name",$input[4]);
    $preQuery->bindParam(":usr_surname",$input[5]);
    if(!$preQuery->execute()){
        return false;
    }
    return true;
}
function encryptPassword($plainpassword){
    $options = [
        'cost' => 11
    ];
    return password_hash($plainpassword, PASSWORD_BCRYPT, $options);
}