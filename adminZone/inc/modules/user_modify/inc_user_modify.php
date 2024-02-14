<?
require_once("inc/inc_admin_global.php");

function modify($input, $usrID)
{
    if ($input[1] == "") {
        $query = "UPDATE proyecto.db_users
        SET user_surname=:usr_surname,user_email=:mail,user_role=:usr_role,user_name=:usr_name,user_nickname=:nick WHERE user_id=:usr_id;
    ";
        $preQuery = db()->prepare($query);
    } else {
        $query = "UPDATE proyecto.db_users
        SET user_surname=:usr_surname,user_email=:mail,user_role=:usr_role,user_name=:usr_name,user_nickname=:nick,user_password=:pass WHERE user_id=:usr_id;
    ";
        $preQuery = db()->prepare($query);
        $preQuery->bindParam(":pass", $input[1]);
    }


    $preQuery->bindParam(":mail", $input[0]);
    $preQuery->bindParam(":nick", $input[2]);
    $preQuery->bindParam(":usr_role", $input[3]);
    $preQuery->bindParam(":usr_name", $input[4]);
    $preQuery->bindParam(":usr_surname", $input[5]);
    $preQuery->bindParam(":usr_id", $usrID);
    if (!$preQuery->execute()) {
        return false;
    }
    return true;
}
function encryptPassword($plainpassword)
{
    $options = [
        'cost' => 11
    ];
    return password_hash($plainpassword, PASSWORD_BCRYPT, $options);
}
function userExists()
{
    $queryNickname = "SELECT user_email,user_nickname FROM db_users WHERE user_nickname = :nickname ;";
    $queryMail = "SELECT user_email,user_nickname FROM db_users WHERE user_email = :email";
    $preQueryNickname = db()->prepare($$queryNickname);
    $preQueryNickname->bindParam(":nickname", "juanhcxd");
    $preQueryMail = db()->prepare($$queryMail);
}
