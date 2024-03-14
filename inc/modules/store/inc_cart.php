<?
//Funcion para añadir un producto al carrito
function addToCart($prod_id,$quantity)
{
    //Si el usuario esta logeado...
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
        addToSessionCart($prod_id,$quantity);
    } else {
        addToSessionCart($prod_id,$quantity);
    }
}

//Funcion para añadir un producto al carrito de la sesion
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
//Funcion para ver si un producto esta en el carrito
function findOnCart($prod_id){
   if(isset($_SESSION["cart"][$prod_id]) && !empty($_SESSION["cart"]) ){
    return true;
   }
   return false;
}
function addToDatabaseCart($prod_id, $quantity)
{
    

}
//Funcion para obtener los productos del carrito de sesion (solo id y cantidad)
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
//Funcion para obtener los productos del carrito de la base de datos (todos los datos)
function getProductsFromCart(){
    $products = [];
    $cartProducts = getCartItems();
    foreach($cartProducts as $key => $quantity){
        array_push($products,getProduct($key));
    }
    return $products;
}
//Funcion para obtener el subtotal del carrito
function getSubtotal(){
    $products = [];
    $subtotal = 0.0;
    $cartProducts = getCartItems();
    foreach($cartProducts as $key => $quantity){
        array_push($products,getProduct($key));
    }
    foreach($products as $product){
        $subtotal += $product["var_product_price"]*getProductQuantity($product["var_id"]);
    }
    return $subtotal;
}
//Funcion para obtener la cantidad de un producto en el carrito
function getProductQuantity($prod_id){
    return $_SESSION["cart"][$prod_id];
}
//Funcion para ver cuantos productos hay en el carrito
function getCartCount(){
    $count = 0;
    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $prod_id => $quantity){
            $count += $quantity;
        }
    }
    return $count;
}
//Funcion para definir el numero de articulos de un producto en el carrito
function setQuantity($prod_id,$quantity){
    $_SESSION["cart"][$prod_id] = $quantity;
}