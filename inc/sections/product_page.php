<!-- Página de producto -->
<div id="productContainer">
  <div class="product-image">
    <img src="<? imageUrl($product["var_product_image"]) ?>" alt="Product Name">
  </div>
  <div class="product-info">
    <h1 class="product-name"><?= $product["var_product_name"] ?></h1>
    <div class="product-variants">
    </div>
    <p class="product-description"><?= $product["var_product_description"] ?></p>
    <p class="product-virtual"><?= isVirtual($product["var_is_virtual"]) ?></p>
    <div class="product-price-button">
      <p class="product-price"><?= $product["var_product_price"] ?>€</p>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <input type="hidden" name="addToCart" value="<?= $product["var_id"] ?>">
        <button class="buy-button">Comprar</button>
      </form>
    </div>
  </div>
</div>