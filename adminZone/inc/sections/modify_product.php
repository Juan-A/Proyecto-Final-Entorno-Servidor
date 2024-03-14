<!-- Formulario para modificar un producto -->
<div class="fieldsContainer">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <span>Nombre de Producto:</span>
            <input type="text" name="name" id="name" value="<?= $prod_data["var_product_name"] ?>">
            <span>Descripción:</span>
            <textarea id="description" name="description"><?= $prod_data["var_product_description"] ?></textarea>
            <span>Imagen:</span>
            <input type="file" name="image" id="image">
            <? haveImage($_GET["id"]) ?>
            <span>Precio:</span>
            <input type="text" name="price" id="price" value="<?= $prod_data["var_product_price"] ?>">
            <span>Impuestos:</span>
            <input type="text" name="vat" id="vat" value="<?= $prod_data["var_product_vat"] ?>">
            <span>Stock:</span>
            <input type="number" name="stock" id="stock" value="<?= $prod_data["var_product_stock"] ?>" min="0">
            <span>Producto Virtual:</span>
            <? fillIsVirtualRadio($_GET["id"]) ?>
            <div id="parentProduct">
                <p>Producto padre:</p>
                <select name="parent">
                    <?
                    fillProductParentSelection($_GET["id"]);
                    ?>
                </select>
            </div>
            <div id="category">
                <p>Categoria del Producto</p>
                <select name="category">
                    <?
                    fillProductCategorySelection($_GET["id"]);
                    ?>
                </select>
            </div>
            <br>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <button type="submit" id="regButton" class="formBtn">Modificar</button>
        </form>
    </div>