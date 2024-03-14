<?
require_once("inc/modules/inc_global.php");
//Función para insertar el menú de la barra de navegación directamente desde la base de datos
function insertNavBarMenu()
{
    $menuItems = getMenuItems();
    $cartCount = getCartCount();
    //   print_r($menuItems);
    foreach ($menuItems as $item) {
        if($item["var_menu_href"] == "cart.php"){
            echo "<a class='buttonOne' href='" . $item[2] . "'>" . $item[1]." ( ".$cartCount." )</a>";
        }else{
            echo "<a class='buttonOne' href='" . $item[2] . "'>" . $item[1] . "</a>";
        }
    }
}
//Función para obtener los items del menú de la barra de navegación
function getMenuItems()
{
    $query = "SELECT * FROM db_site_navbar_menus";
    $preQuery = db()->prepare($query);
    $preQuery->execute();

    return $preQuery->fetchAll();
}
