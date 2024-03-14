<?
session_start();
session_destroy();
addMessage("Te has desconectado correctamente.",0);
header("Location: index.php");
exit();
?>