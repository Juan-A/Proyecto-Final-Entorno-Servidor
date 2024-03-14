<?
//Función para procesar el pedido, llamo con los parámetros 
// de la dirección, el número de contacto y el email.
function createOrder($userId, $address, $contactNumber, $email)
{
    $db = db();
    //Debe de hacerse todo a una, si no, no se hace nada.
    $db->beginTransaction();
    try {

        $products = getProductsFromCart();
        $query = "INSERT INTO db_orders (order_from, order_date,shipping_address, contact_number,order_email) VALUES (:userId, NOW(),:shipping_address,:contactNumber,:email)";
        $preQuery = $db->prepare($query);
        $preQuery->bindParam(":userId", $userId);
        $preQuery->bindParam("shipping_address", $address);
        $preQuery->bindParam(":contactNumber", $contactNumber);
        $preQuery->bindParam(":email", $email);
        //Inserto la compra y obtengo el id de la compra.
        $preQuery->execute();
        $orderId = $db->lastInsertId();
        $queryOrderProduct = "INSERT INTO db_order_products (db_order_id, db_product_id, db_product_quantity, db_product_price) VALUES (:orderId, :productId, :quantity, :price)";
        foreach ($products as $product) {
            // Inserto cada producto en la tabla que asocial los productos con las compras.
            $quantity = getProductQuantity($product["var_id"]);
            $preQuery = $db->prepare($queryOrderProduct);
            $preQuery->bindParam(":orderId", $orderId);
            $preQuery->bindParam(":productId", $product["var_id"]);
            $preQuery->bindParam(":quantity", $quantity);
            $preQuery->bindParam(":price", $product["var_product_price"]);
            $preQuery->execute();
        }
        // Registro la transacción.
        $db->commit();
        return $orderId;
    } catch (PDOException $e) {
        addMessage("Error al procesar el pedido: " . $e, 1);
        header("Location: cart.php");
        //Si hay un error, se deshace todo.
        $db->rollBack();
        exit();
    }
    return false;
}
