<!-- Página de la tienda -->
<div id="storeContainer">

    <header class="store-header">
        <h3><i class='bx bx-store-alt bx-fade-left'></i>¡Bienvenido a nuestra tienda!<i class='bx bx-store-alt bx-fade-right'></i></h3>
    </header>

    <nav class="store-nav">
        <label for="categorySelect">Categorías:</label>
        <select id="categorySelect" onchange="filterProducts()">
            <option value="">Todos los productos</option>
            <?= fillCategorySelect($cat) ?>
        </select>
    </nav>

    <main class="store-main">
        <section class="product-gallery">
            <?
            //Si no se ha seleccionado una categoría, mostrar todos los productos
            if ($cat == null) {
                $allProducts = getAllProducts();
            } else {
                //Si se ha seleccionado una categoría, mostrar los productos de esa categoría
                $allProducts = getProductsFromCategory($cat);
            }
            //Mostrar todos los productos de la categoría seleccionada
            foreach ($allProducts as $key => $product) {
            ?>
                <div class="product-card">
                    <a href="product.php?id=<?= $product["var_id"] ?>" class="product-link">
                        <img src="<?= productImage($product) ?>" alt="<?= $product["var_product_name"] ?>" class="product-image">
                        <h3 class="product-name"><?= $product["var_product_name"] ?></h3>
                    </a>
                    <p class="product-price"><?= $product["var_product_price"] ?>€</p>
                    <form action="product.php" method="get">
                        <input type="hidden" name="addToCart" value="<?= $product["var_id"] ?>">
                        <button class="buy-button">Comprar</button>
                    </form>
                </div>

            <?
            }
            ?>

        </section>
    </main>
</div>