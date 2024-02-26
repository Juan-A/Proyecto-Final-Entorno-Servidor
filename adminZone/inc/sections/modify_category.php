    <div class="fieldsContainer">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <span>Nombre de categoria:</span>
            <input type="text" name="name" id="name" value="<?= $cat_data["var_category_name"] ?>">
            <span>Descripción:</span>
            <textarea id="description" name="description"><?= $cat_data["var_category_description"] ?></textarea>
            <div id="supCategory">
                <p>Categoria Superior</p>
                <select name="parent">
                    <?
                    fillCategorySelect();
                    ?>
                </select>
            </div>
            <br>
            <input type="hidden"  name ="id" value="<?=$_GET["id"]?>">
            <button type="submit" id="regButton" class="formBtn">Modificar</button>
        </form>
    </div>