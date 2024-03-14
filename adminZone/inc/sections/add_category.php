<!-- Formulario para añadir una categoria -->
<div class="fieldsContainer">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <span>Nombre de categoria:</span>
            <input type="text" name="name" id="name">
            <span>Descripción:</span>
            <textarea id="description" name="description"></textarea>
            <div id="supCategory">
                <p>Categoria Superior</p>
                <select name="parent">
                    <?
                    fillCategorySelect(-1);
                    ?>
                </select>
            </div>
            <br>
            <button type="submit" id="regButton" class="formBtn">Modificar</button>
        </form>
    </div>