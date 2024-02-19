<main>
    <div class="fieldsContainer">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <span>Nombre de categoria:</span>
            <input type="text" name="name" id="name" value="<?= $cat_data["var_category_name"] ?>">
            <span>Descripción:</span>
            <textarea id="description" name="description"><?= $cat_data["var_category_description"] ?></textarea>
            <span>¿Es subcategoria?:</span>
            <select name="is_subcategory" id="is_subcat">
                <?
                $isChild = $cat_data["var_is_subcategory"];
                if (boolval($isChild)) {
                    echo
                    "
                    <option selected value='1'>Sí</option>
                    <option value='0'>No</option>
                    ";
                } else {
                    echo
                    "
                    <option value='1'>Sí</option>
                    <option value='0' selected>No</option>
                    ";
                }
                ?>
            </select>
            <div id="supCategory">
            <span>Categoria Superior</span>
            <select>
            </div>
            <button type="submit" id="regButton" class="formBtn">Modificar</button>
        </form>
    </div>
</main>