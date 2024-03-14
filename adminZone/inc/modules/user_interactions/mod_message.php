<?
// Funcion para mostrar los mensajes dados al usuario
//Es capaz de manejar mas de un mensaje a la vez.
function handleMessage()
{

    if (isset($_SESSION["message"])) {
        $messageArray = $_SESSION["message"];
        $finalMessage = "<div id='message'>";
        foreach ($messageArray as $key => $message) {
            if ($message[1] == 1) {
                $finalMessage .= "<span class='error'>" . $message[0] . "</span>";
            } else if ($message[1] == 0) {
                $finalMessage .= "<span class='success'>" . $message[0] . "</span>";
            }
        }
        echo $finalMessage."</div>";
    }
    // Elimino los mensajes para que no se muestren en la siguiente página
    unset($_SESSION["message"]);
}
// Funcion para añadir un mensaje a la lista de mensajes
function addMessage($message, $status)
{
    /*Almacena el mensaje de error en un array, [mensaje, estado]:
    Códigos de estado:
    0 -> Éxito
    1 -> Error
    */

        if(isset($_SESSION["message"]) && is_array($_SESSION["message"])){
            array_push($_SESSION["message"], [$message, $status]);
        }else{
            $_SESSION["message"] = [];
            array_push($_SESSION["message"], [$message, $status]);
        }
    
    
}
