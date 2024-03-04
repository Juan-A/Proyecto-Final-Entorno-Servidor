<main>
    <div class="tableContainer">
        <table>
            <tr>
                <th>
                    ID de Producto
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Imagen
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Impuesto
                </th>
                <th>
                    ¿Variante?
                </th>
                <th>
                    Stock
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

            $products = getAllProducts();
            foreach ($products as $product) {
                echo "<tr>";
                foreach ($product as $key => $data) {
                   
                    if($key == "var_product_is_variant"){
                        echo "<td>";
                        if(!boolval($data)){
                            echo "<center><i class='bx bxs-x-square' style='color:red;font-size:2em'></i></center>";
                        }else{
                            echo "<center><i class='bx bxs-check-square' style='color:green;font-size: 2em;'></i></center>";

                        }
                        echo "</td>";
                    }else if($key == "var_parent_product" || $key == "var_is_virtual" || $key == "var_product_category"){
                        //do nothing
                    }
                    else{
                        echo "<td>";
                        echo $data;
                        echo "</td>";
                    }
                
                }
                echo "<td><a class='buttonWarning' href='product_modify.php?id=" . $product["var_id"] . "'><i class='bx bx-edit' ></i>Editar Producto</a></td>";
                echo "<td><a class='buttonDanger deleteUser' href='product_management.php?deleteProduct=" . $product["var_id"] . "'><i class='bx bxs-trash bx-tada-hover' ></i></i>Eliminar Producto</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</main>