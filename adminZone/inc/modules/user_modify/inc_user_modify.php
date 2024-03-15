<?
require_once("inc/inc_admin_global.php");
/*
Funcion para modificar un usuario con un id
y un array con los datos del usuario, que son:
[0] => Email
[1] => Password
[2] => Nickname
[3] => Rol
[4] => Nombre
[5] => Apellido

Si el password está vacío, no se modifica, uso diferente query.
*/
function modify($input, $usrID)
{
    if ($input[1] == "") {
        $query = "UPDATE db_users
        SET user_surname=:usr_surname,user_email=:mail,user_role=:usr_role,user_name=:usr_name,user_nickname=:nick WHERE user_id=:usr_id;
    ";
        $preQuery = db()->prepare($query);
    } else {
        $query = "UPDATE db_users
        SET user_surname=:usr_surname,user_email=:mail,user_role=:usr_role,user_name=:usr_name,user_nickname=:nick,user_password=:pass WHERE user_id=:usr_id;
    ";
        $preQuery = db()->prepare($query);
        $newPass = encryptPassword($input[1]);
        $preQuery->bindParam(":pass", $newPass);
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

