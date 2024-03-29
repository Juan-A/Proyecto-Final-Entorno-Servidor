<?
//Incluye todos los archivos necesarios para el funcionamiento del panel de administración
/* Me aseguro de que la sesión esté iniciada en todas las páginas, 
ya que este archivo se incluye en todas las páginas del panel de administración.
*/
session_start();
require_once 'adminConfig.php';
require_once '../inc/modules/database/db_connect.php';
include_once 'modules/site_identity/mod_site_name.php';
require_once 'modules/site_identity/inc_admin_nav.php';
require_once 'modules/auth/inc_logged_role.php';
require_once 'modules/user_interactions/mod_message.php';
require_once 'modules/user_modify/inc_get_users.php';
require_once 'modules/user_modify/inc_user_modify.php';
require_once 'modules/user_modify/inc_delete_user.php';
require_once 'modules/categories/inc_get_categories.php';
require_once 'modules/categories/inc_delete_categories.php';
require_once 'modules/categories/inc_get_subcategories.php';
require_once 'modules/categories/inc_modify_category.php';
require_once 'modules/products/inc_get_product_category.php';
require_once 'modules/products/inc_get_products.php';
require_once 'modules/products/inc_delete_products.php';
require_once 'modules/products/inc_get_parent_product.php';
require_once 'modules/products/inc_upload_image.php';
require_once 'modules/products/inc_modify_product.php';
require_once 'modules/products/inc_get_child_products.php';
require_once 'modules/categories/inc_add_category.php';
require_once 'modules/products/inc_add_product.php';
//Si el usuario no está logueado o no tiene el rol mínimo, lo redirige al index (Lo defino en adminZone/adminConfig.php)
if(isLogged() && verifyUserRole($_SESSION["user_email"],$_SESSION["user_nickname"]) >= MINIMUM_ROLE){
    //Do nothing
}else{
    addMessage("Error, acceso no autorizado.",1);
    header("Location: ../index.php");
}
