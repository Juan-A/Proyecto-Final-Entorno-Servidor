<?
// Elimina un producto del carrito.
function deleteFromCart($prod_id){
    // Elimina unidades mientras haya más de una, entonces elimina el producto.
    if(isset($_SESSION["cart"][$prod_id])){
        if($_SESSION["cart"][$prod_id] > 1){
            $_SESSION["cart"][$prod_id]--;
        } else {
            unset($_SESSION["cart"][$prod_id]);
        }
    }
    addMessage("Producto eliminado del carrito.",0);
    header("Location: cart.php");
    exit();
}