<!-- Página del carrito de compras -->
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
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $cartProducts = getCartItems();
      $products = [];
      foreach ($cartProducts as $key => $quantity) {
        $product = getProduct($key);
      ?>
        <tr>

          <td>
            <select name="quantity" onchange="setQuantity(this.value, <?= $key ?>)">
              <?php
              for ($i = 1; $i <= 10; $i++) {
                $selected = ($i == $quantity) ? "selected" : "";
                echo "<option value='$i' $selected>$i</option>";
              }
              ?>
            </select>
          </td>
          <td><?= $product["var_product_name"] ?></td>
          <td></td>
          <td><img src="<?= productImage($product) ?>"></td>
          <td><?= $product["var_product_price"] ?> €</td>
          <td><?= doubleval($product["var_product_price"]) * $quantity ?> €</td>

          <td>
            <form action="<?= $_SERVER["PHP_SELF"] ?>">
              <input type="hidden" name="delete" value="<?= $key ?>">
              <button class="delete-button">Eliminar</button>
            </form>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <div class="right-aligned">
    <div class="tax-total">

    </div>
    <form action="checkOrder.php">
      <button class="process-button">Procesar compra</button>
    </form>
  </div>
</div>