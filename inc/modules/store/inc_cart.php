<?
function addToCart($prod_id,$quantity)
{
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
        addToSessionCart($prod_id,$quantity);
    } else {
        addToSessionCart($prod_id,$quantity);
    }
}

function addToSessionCart($prod_id,$quantity)
{
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"][$prod_id] = $quantity;
    }else if(isset($_SESSION["cart"])){
        $match = findOnCart($prod_id);
        if(!$match){
            $_SESSION["cart"][$prod_id] = $quantity;
        }else{
            $_SESSION["cart"][$prod_id] +=1;

        }
    }
    
}
function findOnCart($prod_id){
   if(isset($_SESSION["cart"][$prod_id]) && !empty($_SESSION["cart"]) ){
    return true;
   }
   return false;
}
function addToDatabaseCart($prod_id, $quantity)
{
}

function getCartItems(){
    $products = [];
    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $prod_id => $quantity){
            $products[$prod_id] = $quantity;
        }
        return $products;
    }
    return $products;
}