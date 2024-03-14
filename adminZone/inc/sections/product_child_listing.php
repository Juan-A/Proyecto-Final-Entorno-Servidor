<!-- Muestra en una tabla los productos que son variantes de un producto -->
<div class="tableContainer">
    <? $child_products = getChildProducts($_GET["id"]);
    if (!$child_products) {
        echo "<h3 style='text-align:center;'>No hay variantes del producto.</h3>";
    } else {


    ?>
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

            foreach ($child_products as $child) {
                echo "<tr>";
                foreach ($child as $key => $data) {
                    if (
                        $key == "var_product_is_variant" || $key == "var_parent_product" ||
                        $key == "var_product_category" || $key == "var_is_virtual"
                    ) {
                    } else if ($key == "var_product_image") {
                        echo "<td>";
                        if (is_null($data)) {
                            echo "<center><i class='bx bxs-x-square' style='color:red;font-size:2em'></i></center>";
                        } else {
                            echo "<img src='../uploads/product_images/" . $data . "' width='200px'>";
                        }
                        echo "</td>";
                    } else {
                        echo "<td>";
                        echo $data;
                        echo "</td>";
                    }
                }
                echo "<td><a class='buttonWarning' href='product_modify.php?id=" . $child["var_id"] . "'><i class='bx bx-edit' ></i>Editar Producto</a></td>";
                echo "<td><a class='buttonDanger deleteUser' href='product_management.php?deleteProduct=" . $child["var_id"] . "'><i class='bx bxs-trash bx-tada-hover' ></i></i>Eliminar Producto</a></td>";
                echo "</tr>";
            }

            ?>
        </table>
    <? } ?>
</div>