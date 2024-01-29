<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST["username"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["mail"];
    $password = encryptPassword($_POST["password"]);

    //Fits all the data in an array
    $data = [$mail,$password,$user,0,$name,$surname];
    if(register($data)){
    echo "BIEN";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- este título se obtiene desde la base de datos -->
    <title><?= siteName() ?></title>
    <link rel="stylesheet" href="inc/styles/main_style.css">
    <link rel="stylesheet" href="inc/styles/auth_form_styles.css">
    <script defer src="inc/modules/auth/samePassword.js"></script>
</head>

<body>
    <!-- Adding navbar -->
    <? require_once("inc/sections/nav_bar.php"); ?>
    <!--Register box-->
    <? require_once("inc/sections/register_form.php"); ?>
    <!--Footer-->
    <? require_once("inc/sections/footer.php"); ?>
</body>

</html>