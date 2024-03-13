<div id="cartContainer">
  <h1>Carrito de compras</h1>
  <table>
    <thead>
      <tr>

        <th>Cantidad</th>
        <th>Nombre</th>
        <th>Variante</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
     <?
     $cartProducts = getCartItems();
    // print_r($cartProducts);
     $products = [];
     foreach($cartProducts as $key => $quantity){
        $product = getProduct($key);
     
 
     ?>
      <tr>
        <td><?=$quantity?></td>
        <td><?=$product["var_product_name"]?></td>
        <td></td>
        <td><img src="<?=productImage($product)?>"></td>
        <td><?=$product["var_product_price"]?></td>
        <td><?=doubleval($product["var_product_price"])*$quantity?></td>
      </tr>
      <?
      }
      ?>
    </tbody>
  </table>
  <div class="right-aligned">
    <div class="tax-total">

    </div>
    <button class="process-button">Procesar compra</button>
  </div>
</div>
