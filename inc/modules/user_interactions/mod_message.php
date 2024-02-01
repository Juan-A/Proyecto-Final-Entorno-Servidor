<?
function handleMessage(){
    if(isset($_SESSION["message"])){
        $messageArray=$_SESSION["message"];
        foreach ($messageArray as $message => $status) {
            if($status==1){
                echo "<span class='error'>".$message."</span>";
            }else if($status==0){
                echo "<span class='success'>".$message."</span>";
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