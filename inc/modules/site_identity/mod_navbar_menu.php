<?
require_once("inc/modules/inc_global.php");
function insertNavBarMenu(){
    $menuItems = getMenuItems();
 //   print_r($menuItems);
    foreach($menuItems as $item){
       echo "<a class='navButton' href='".$item[2]."'>".$item[1]."</a>";
    }
}
function getMenuItems(){
    $query = "SELECT * FROM db_site_navbar_menus";
    $preQuery = db()->prepare($query);
    $preQuery->execute();
    
    return $preQuery->fetchAll();
    
}


?>