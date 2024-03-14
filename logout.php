<?
require_once("inc/modules/inc_global.php");
require_once("inc/modules/inc_global_media.php");
session_destroy();
addMessage("Te has desconectado correctamente.",0);
header("Location: index.php");
exit();
?>