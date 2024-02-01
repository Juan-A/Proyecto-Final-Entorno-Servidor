<?
function handleMessage(){
    if(isset($_SESSION["message"])){
        $message=$_SESSION["message"];
        if($message[1]==1){
            echo "<span class='error'>".$message[0]."</span>";
        }else if($message[1]==0){
            echo "<span class='success'>".$message[0]."</span>";
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