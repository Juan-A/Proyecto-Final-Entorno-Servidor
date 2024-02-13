<?
require_once("inc/modules/inc_admin_global.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_id = $_GET["user_id"];
    $user = $_POST["username"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    if(empty($user) || empty($name) || empty($surname) || empty($mail)){
        addMessage("Error al modifcar el usuario, revise que todos los campos han sido rellenados.",1);
    }else{
        if(!empty($password)){
            $password = encryptPassword($_POST["password"]);
        }
        //Fits all the data in an array
        $data = [$mail,$password,$user,0,$name,$surname];
        try{
            modify($data,$user_id);
            header("Location: user_management.php");
        }catch(PDOException $e){
            addMessage("Error durante el registro, inténtelo de nuevo más tarde.",1);
        }
    }
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?=siteName()?> - User Management</title>
    <link rel="stylesheet" href="inc/styles/main_style_admin.css">
</head>
<body>

<!-- Adding navbar -->
<? require_once("inc/sections/nav_bar.php"); ?>
<? handleMessage() ?>
<? include_once('inc/sections/modify_user.php');?>
<?// require_once("inc/sections/footer.php"); ?>
</body>
</html>