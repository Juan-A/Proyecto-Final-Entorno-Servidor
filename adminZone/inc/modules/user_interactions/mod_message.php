<?
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
    unset($_SESSION["message"]);
}
function addMessage($message, $status)
{
    /*Stores the error message in an array, [message,status]:
    Status codes:
    0 -> Success
    1-> Error
    */

        if(isset($_SESSION["message"]) && is_array($_SESSION["message"])){
            array_push($_SESSION["message"], [$message, $status]);
        }else{
            $_SESSION["message"] = [];
            array_push($_SESSION["message"], [$message, $status]);
        }
    
    
}
