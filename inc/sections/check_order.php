<div id="orderContainer">
  <div class="order-form">
    <h1>Información del pedido</h1>
    <form method="post" action="processOrder.php">
      <label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required value="<?=$_SESSION["user_name"]?>">

      <label for="lastname">Apellidos:</label>
      <input type="text" id="lastname" name="lastname" required value="<?=$_SESSION["user_surname"]?>">

      <label for="mobile">Número móvil:</label>
      <input type="tel" id="mobile" name="mobile" required>

      <label for="address">Dirección:</label>
      <textarea id="address" name="address" required></textarea>
      <input type="hidden" name="subtotal" value="<?=getSubtotal()?>">
      <button class="process-order-button">Procesar pedido</button>
    </form>
  </div>
  <div class="order-summary">
  <h1>Resumen del pedido</h1>
  <ul class="product-list">
  <?
  $products = getProductsFromCart();
  foreach($products as $product){
 ?>
  <li>
    <div class="product-name">
      <strong>Producto:</strong> <?=getProductQuantity($product["var_id"])?> x <?=$product["var_product_name"]?>
    </div>
    <span class="price"><?=getProductQuantity($product["var_id"])*$product["var_product_price"]?></span>
  </li>
  <?
   }
  ?>
</ul>

  
</div>

</div>
