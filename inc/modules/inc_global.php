<?
//Incluye los módulos necesarios para el funcionamiento de la tienda.
session_start();
require_once("database/db_connect.php");
require_once("site_identity/mod_navbar_menu.php");
require_once("auth/mod_register.php");
require_once("auth/mod_login.php");
require_once("user_interactions/mod_message.php");
require_once("auth/mod_role.php");
require_once("store/inc_get_products.php");
require_once("store/inc_get_categories.php");
require_once("store/inc_cart.php");
require_once("store/inc_process_order.php");
require_once("mail/mail.php");
require_once("store/inc_delete_from_cart.php");