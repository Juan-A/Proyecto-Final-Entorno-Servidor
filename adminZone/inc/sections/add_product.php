<!-- Formulario para añadir un producto -->
<div class="fieldsContainer">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <span>Nombre de Producto:</span>
            <input type="text" name="name" id="name">
            <span>Descripción:</span>
            <textarea id="description" name="description"></textarea>
            <span>Imagen:</span>
            <input type="file" name="image" id="image">
            <span>Precio:</span>
            <input type="text" name="price" id="price">
            <span>Impuestos:</span>
            <input type="text" name="vat" id="vat">
            <span>Stock:</span>
            <input type="number" name="stock" id="stock"  min="0">
            <span>Producto Virtual:</span>
            <?fillIsVirtualRadio(-1)?>
            <div id="parentProduct">
                <p>Producto padre:</p>
                <select name="parent">
                    <?
                    fillProductParentSelection(-1);
                    ?>
                </select>
            </div>
            <div id="category">
                <p>Categoria del Producto</p>
                <select name="category">
                    <?
                    fillProductCategorySelection(-1);
                    ?>
                </select>
            </div>
            <br>
            <button type="submit" id="regButton" class="formBtn">Modificar</button>
        </form>
    </div>