    <div class="tableContainer">
        <? $subcategories = getSubcategories($_GET["id"]);
        if (!$subcategories) {
            echo "<h3 style='text-align:center;'>No hay subcategorias.</h3>";
        } else {


        ?>
            <table>
                <tr>
                    <th>
                        ID de Categoria
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        ¿Es Subcategoria?
                    </th>
                    <th>
                        ¿Cuál es la categoria principal?
                    </th>
                    <th>
                        Editar
                    </th>
                    <th>
                        Eliminar
                    </th>
                </tr>
                </tr>
                <?

                foreach ($subcategories as $subcategory) {
                    echo "<tr>";
                    foreach ($subcategory as $key => $data) {
                        echo "<td>";
                        if ($key == "var_is_subcategory") {    
                                              
                            if (!boolval($data)) {
                                echo "No es subcategoria.";
                            }else{
                                echo "<center><i class='bx bxs-check-square' style='color:green;font-size: 2em;' ></i></center>";
                            }
                        } else if ($key == "var_parent_category") {
                            if (is_null($data)) {
                                echo "No tiene categoria superior.";
                            }else{
                                echo "Subcategoría de <b>".getCategoryName($_GET["id"])."</b>";
                            }
                        } else {
                            echo $data;
                        }
                        echo "</td>";
                    }
                    echo "<td><a class='buttonWarning' href='category_modify.php?id=" . $subcategory["var_code"] . "'><i class='bx bx-edit' ></i>Editar Categoria</a></td>";
                    echo "<td><a class='buttonDanger deleteUser' href='categories_management.php?deleteCategory=" . $subcategory["var_code"] . "'><i class='bx bxs-trash bx-tada-hover' ></i></i>Eliminar Categoria</a></td>";
                    echo "</tr>";
                }

                ?>
            </table>
        <? } ?>
    </div>