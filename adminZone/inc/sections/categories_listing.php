<!-- Página que muestra todas las categorías en una tabla -->
<!-- Se puede editar o eliminar una categoría -->
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
                   
                    if($key == "var_is_subcategory"){
                        echo "<td>";
                        if(!boolval($data)){

                            echo "<center><i class='bx bxs-x-square' style='color:red;font-size:2em'></i></center>";
                        }else{
                            echo "<center><i class='bx bxs-check-square'style='color:green;font-size: 2em;'></i></center>";
                        }
                        echo "</td>";
                    }else if( $key == "var_parent_category"){
                        
                    }else{
                        echo "<td>";
                        echo $data;
                        echo "</td>";
                    }
                
                }
                echo "<td><a class='buttonWarning' href='category_modify.php?id=" . $category["var_code"] . "'><i class='bx bx-edit' ></i>Editar Categoria</a></td>";
                echo "<td><a class='buttonDanger deleteUser' href='categories_management.php?deleteCategory=" . $category["var_code"] . "'><i class='bx bxs-trash bx-tada-hover' ></i></i>Eliminar Categoria</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</main>