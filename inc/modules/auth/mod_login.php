<?php
require_once("inc/modules/inc_global.php");

function validateLogin($user,$password){
    $query = "SELECT user_id,user_email,user_role,user_name,user_surname,user_password FROM db_users WHERE user_nickname = :user OR user_email = :user";

    $preQuery = db()->prepare($query);
    $preQuery->bindParam(":user",$user);

    if($preQuery->execute() && $preQuery->rowCount() >=1 ){
        $userData = $preQuery->fetch();
        if(password_verify($password,$userData["user_password"])){
            session_start();
            $_SESSION["user_role"] =$userData["user_role"];
            $_SESSION["user_name"] = $userData["user_name"];
            $_SESSION["user_surname"] =$userData["user_surname"];
            $_SESSION["user_email"] = $userData["user_email"];
            $_SESSION["logged_in"] = true;
            return true;
        }
    }
    return false;
}
?>