<?

function createOrder($userId, $address, $contactNumber, $email)
{
    $db = db();
    $db->beginTransaction();
    try {

        $products = getProductsFromCart();
        $query = "INSERT INTO db_orders (order_from, order_date,shipping_address, contact_number,order_email) VALUES (:userId, NOW(),:shipping_address,:contactNumber,:email)";
        $preQuery = $db->prepare($query);
        $preQuery->bindParam(":userId", $userId);
        $preQuery->bindParam("shipping_address", $address);
        $preQuery->bindParam(":contactNumber", $contactNumber);
        $preQuery->bindParam(":email", $email);
        $preQuery->execute();
        $orderId = $db->lastInsertId();
        $queryOrderProduct = "INSERT INTO db_order_products (db_order_id, db_product_id, db_product_quantity, db_product_price) VALUES (:orderId, :productId, :quantity, :price)";
        foreach ($products as $product) {
            $quantity = getProductQuantity($product["var_id"]);
            $preQuery = $db->prepare($queryOrderProduct);
            $preQuery->bindParam(":orderId", $orderId);
            $preQuery->bindParam(":productId", $product["var_id"]);
            $preQuery->bindParam(":quantity", $quantity);
            $preQuery->bindParam(":price", $product["var_product_price"]);
            $preQuery->execute();
        }
        $db->commit();
        return $orderId;
    } catch (PDOException $e) {
        addMessage("Error al procesar el pedido: " . $e, 1);
        header("Location: cart.php");
        $db->rollBack();
        exit();
    }
    return false;
}
