<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'inc/mail/src/Exception.php';
require 'inc/mail/src/PHPMailer.php';
require 'inc/mail/src/SMTP.php';
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");
//Configuración de correo
$from = returnSiteName();
$server = "smtp.freesmtpservers.com";
$usero = returnSiteName() . "@shop.es";
$password = "nerja123";
$encType = "tls";
//

// Creo el mensaje con los datos del pedido.
function createMail($orderId, $mail, $name, $address)
{
    $subtotal = 0;
    $message = "<h2>Pedido nº$orderId </h2> <h3>Cliente: $name</h3>
                <p>Dirección: $address</p>";
    $message .= "<style>
    table, td, th {
        border: 2px solid black;
        border-collapse: collapse;
    }
    th{
        background-color: silver;
    }
    </style>";
    $message .= "<h4><i>Usuario: $mail </i></h4>";
    $message .= "<i>Detalle del pedido</i>:";
    $message .= "<br><br>";
    $message .= "<table>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Unidades</th>
                        <th>Subtotal producto</th>
                    </tr>";
    //Cargo los datos de los productos con sus respectivas claves.
    $products = getProductsFromCart();
    //Creo una row en la tabla para cada uno de ellos.
    foreach ($products as $product) {
        $name = $product["var_product_name"];
        $description = $product["var_product_description"];
        $price = $product["var_product_price"];
        $units = getProductQuantity($product["var_id"]);
        $subtotal = getProductQuantity($product["var_id"]) * $product["var_product_price"];

        $message .= "<tr>
                        <td>$name</td>
                        <td>$description</td>
                        <td>$price €</td>
                        <td>$units</td>
                        <td>$subtotal</td>
                    </tr>";
    }
    $message .= "</table>";
    $message .= "<br><br>";
    $message .= "<i>Monto total:" . getSubtotal() . " €</i>";
    return $message;
}
function loadMailConf($server, $port, $user, $password, $encType, $useEnc)
{

    //Almaceno en un array las conf. de correo.
    $conf = [
        "server" => $server,
        "port" => $port,
        "user" => $user,
        "password" => $password,
        "enc" => $encType,
        "useEnc" => $useEnc
    ];
    //Las devuelvo.
    return $conf;
}
//Función para envio de correo.
function sendMail($conf, $mailDest, $nameDest, $msg, $subject)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = "UTF-8";
    // $mail->SMTPDebug = 2;
    //Si se ha configurado el uso de encriptación, dice cual usar
    if ($conf["useEnc"]) {
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = $conf["enc"];
    }
    $mail->Host = $conf["server"];
    $mail->Port = $conf["port"];
    $mail->Username = $conf["user"];
    $mail->Password = $conf["password"];
    // $mail->Password = "amhwftxuqtjjmxyb";
    $mail->SetFrom($conf["user"], returnSiteName() . " - Pedidos");
    $mail->Subject = $subject;
    $mail->MsgHTML($msg);
    $address = $mailDest;
    $mail->AddAddress($address, $nameDest);
    if (!$mail->Send()) {
        throw new Exception("Error al enviar el correo, inténtelo de nuevo.");
    }
}
