<?
//Página para procesar el pedido
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

//Configuración de correo
$from = returnSiteName();
$server = "smtp.freesmtpservers.com";
$port = 25;
$user = returnSiteName() . "@shop.es";
$password = "nerja123";
$encType = "tls";
$useEnc = false;


try {
    //Hacer el pedido
    $orderId = createOrder($_SESSION["user_id"], $_POST["address"], $_POST["mobile"], $_SESSION["user_email"]);

    //Preparar el correo
    $mail = createMail($orderId, $_SESSION["user_email"], $_SESSION["user_name"] . " " . $_SESSION["user_surname"], $_POST["address"]);
    
    //Crear configuración de correo
    $confMail = loadMailConf($server, $port, $user, $password, $encType, $useEnc);
    
    //Enviar correos

    //Enviar correo al usuario
    sendMail($confMail, $_SESSION["user_email"], $_SESSION["user_name"] . " " . $_SESSION["user_surname"], $mail, "Pedido " . $orderId);
    //Enviar correo al administrador
    sendMail($confMail, $user, returnSiteName(), $mail, "Pedido Entrante - " . $orderId);
    //Limpiar carrito
    unset($_SESSION["cart"]);
    //Mensaje de éxito
    addMessage("¡Su pedido nº $orderId ha sido realizado correctamente!", 0);
    //Redirigir a la tienda
    header("Location: store.php");
} catch (Error $e) {
    addMessage("Hubo un error durante la creación del pedido.", 1);
}
