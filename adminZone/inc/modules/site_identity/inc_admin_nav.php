<?
require_once("inc/inc_admin_global.php");
//Inserta el menú de navegación en el admin desde bd.
function insertNavBarMenu(){
    $menuItems = getMenuItems();
 //   print_r($menuItems);
    foreach($menuItems as $item){
       echo "<a class='buttonOne' href='".$item[2]."'>".$item[1]."</a>";
    }
}
//Obtiene los items del menú de navegación
function getMenuItems(){
    $query = "SELECT * FROM db_admin_navbar_menus";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    
    return $preQuery->fetchAll();
    
}


?>