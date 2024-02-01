<?
function handleMessage(){
    
    if(isset($_SESSION["message"])){
        $messageArray=$_SESSION["message"];
        foreach ($messageArray as $key => $message) {
            if($message[1]==1){
                echo "<div id='message'><span class='error'>".$message[0]."</span></div>";
            }else if($message[1]==0){
                echo "<div id='message'><span class='success'>".$message[0]."</span></div>";
            }
        }
        
    }
    unset($_SESSION["message"]);
}
function addMessage($message,$status){
    /*Stores the error message in an array, [message,status]:
    Status codes:
    0 -> Success
    1-> Error
    */
    $_SESSION["message"] =[];
    array_push($_SESSION["message"],[$message,$status]);
}