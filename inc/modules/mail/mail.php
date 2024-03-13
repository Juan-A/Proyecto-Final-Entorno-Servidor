<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'inc/mail/src/Exception.php';
require 'inc/mail/src/PHPMailer.php';
require 'inc/mail/src/SMTP.php';
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");

$from = returnSiteName();
$server = "smtp.freesmtpservers.com";
$usero = returnSiteName()."@shop.es" ;
$password = "nerja123";
$encType = "tls";

function createMail($orderId, $mail, $name,$address)
{
    $subtotal = 0;
    $mensaje = "<h2>Pedido nº$orderId </h2> <h3>Cliente: $name</h3>
                <p>Dirección: $address</p>";
    $mensaje .= "<style>
    table, td, th {
        border: 2px solid black;
        border-collapse: collapse;
    }
    th{
        background-color: silver;
    }
    </style>";
    $mensaje .= "<h4><i>Usuario: $mail </i></h4>";
    $mensaje .= "<i>Detalle del pedido</i>:";
    $mensaje .= "<br><br>";
    $mensaje .= "<table>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Peso</th>
                        <th>Unidades</th>
                        <th>Subtotal producto</th>
                    </tr>";
    //Cargo los datos de los productos con sus respectivas claves.
    $productos = getProductsFromCart();
    //Creo una row en la tabla para cada uno de ellos.
    foreach ($productos as $producto) {
        $nombre = $producto["var_product_name"];
        $descripcion = $producto["var_product_description"];
        $price = $producto["var_product_price"];
        $unidades = getProductQuantity($producto["var_id"]);
        $subtotal = getProductQuantity($producto["var_id"])*$producto["var_product_price"];

        $mensaje .= "<tr>
                        <td>$nombre</td>
                        <td>$descripcion</td>
                        <td>$price €</td>
                        <td>$unidades</td>
                        <td>$subtotal</td>
                    </tr>";
    }
    $mensaje .= "</table>";
    $mensaje .= "<br><br>";
    $mensaje .= "<i>Monto total:".getSubtotal()." €</i>";
    return $mensaje;
}
function loadMailConf($server,$port,$user,$password,$encType,$useEnc)
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
    if($conf["useEnc"]){
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = $conf["enc"];
    }
    $mail->Host = $conf["server"];
    $mail->Port = $conf["port"];
    $mail->Username = $conf["user"];
    $mail->Password = $conf["password"];
    // $mail->Password = "amhwftxuqtjjmxyb";
    $mail->SetFrom($conf["user"], returnSiteName()." - Pedidos");
    $mail->Subject = $subject;
    $mail->MsgHTML($msg);
    $address = $mailDest;
    $mail->AddAddress($address, $nameDest);
    if (!$mail->Send()) {
        throw new Exception("Error al enviar el correo, inténtelo de nuevo.");
    }
}
