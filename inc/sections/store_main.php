<div id="storeContainer">

    <header class="store-header">
        <!-- Aquí puedes agregar el logo, el nombre de la tienda, y otros elementos del encabezado -->
    </header>

    <nav class="store-nav">
        <!-- Aquí puedes agregar un select desplegable con las categorías de productos -->
        <label for="categorySelect">Categorías:</label>
        <select id="categorySelect" onchange="filterProducts()">
            <option value="">Todos los productos</option>
            <?=fillCategorySelect($cat)?>
            
        </select>
    </nav>

    <main class="store-main">
        <section class="product-gallery">
            <?
            if($cat == null){
                $allProducts = getAllProducts();
            }else{
                $allProducts = getProductsFromCategory($cat);
            }
            foreach ($allProducts as $key => $product) {
            ?>
                <div class="product-card">
                <a href="product.php?id=<?=$product["var_id"]?>" class="product-link">
                    <img src="<?=productImage($product)?>" alt="<?=$product["var_product_name"]?>" class="product-image">
                    <h3 class="product-name"><?=$product["var_product_name"]?></h3>
                </a>
                    <p class="product-price"><?=$product["var_product_price"]?>€</p>
                    <form action="product.php" method="get">
      <input type="hidden" name="addToCart" value="<?=$product["var_id"]?>">
                    <button class="buy-button">Comprar</button>
                    </form>
                </div>

            <?
            }
            ?>

        </section>
    </main>

    <footer class="store-footer">
        <!--Pending-->
    </footer>

</div>