<main>
    <div class="tableContainer">
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

            $categories = getAllCategories();
            foreach ($categories as $category) {
                echo "<tr>";
                foreach ($category as $key => $data) {
                   echo "<td>";
                    if($key == "var_is_subcategory"){
                        if(!boolval($data)){
                            echo "No es subcategoria.";
                        }
                    }else if( $key == "var_parent_category"){
                        if(is_null($data)){
                            echo "No tiene categoria superior.";
                        }
                    }else{
                        echo $data;
                    }
                echo "</td>";
                }
                echo "<td><a class='buttonWarning' href='category_modify.php?id=" . $category["var_code"] . "'><i class='bx bx-edit' ></i>Editar Categoria</a></td>";
                echo "<td><a class='buttonDanger deleteUser' href='categories_management.php?deleteCategory=" . $category["var_code"] . "'><i class='bx bxs-trash bx-tada-hover' ></i></i>Eliminar Categoria</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</main>