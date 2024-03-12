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
            foreach ($allProducts as $key => $producto) {
            ?>
                <div class="product-card">
                <a href="product.php?id=<?=$producto["var_id"]?>" class="product-link">
                    <img src="<?=productImage($producto)?>" alt="<?=$producto["var_product_name"]?>" class="product-image">
                    <h3 class="product-name"><?=$producto["var_product_name"]?></h3>
                </a>
                    <p class="product-price"><?=$producto["var_product_price"]?>€</p>
                    <button class="buy-button">Comprar</button>
                </div>

            <?
            }
            ?>

        </section>
    </main>

    <footer class="store-footer">
        <!-- Aquí puedes agregar información del pie de página, como enlaces a políticas de privacidad, términos y condiciones, etc. -->
    </footer>

</div>