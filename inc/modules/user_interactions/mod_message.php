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