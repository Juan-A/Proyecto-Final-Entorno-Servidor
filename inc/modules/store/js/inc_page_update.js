// Cuando se cambia el valor del select, se redirige a la página con el valor seleccionado
function filterProducts(){
    $select = document.querySelector("#categorySelect")
    window.location.replace("store.php?cat="+$select.value);
}
// Cuando se cambia el valor del select, se setea la cantidad de productos de un producto
function setQuantity($quantity, $idProd){
    window.location.replace("cart.php?setQuantity="+$quantity+"&prod_id="+$idProd);
}