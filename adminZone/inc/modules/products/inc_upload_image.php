<?php
require_once("inc/inc_admin_global.php");
//Función para subir una imagen de producto
// El parametro recibe $_FILES["img"]
function uploadProductImage($fileInput)
{
    // Rutas
    $targetDir = "../uploads/product_images/"; // Directorio destino
    $allowedMimeTypes = ["image/jpeg", "image/png", "image/gif"]; // Tipos imagen permitidos
    $maxFileSize = 5000000; // Maximo 5MB

    // Comprueba la subida del archivo
    if ($fileInput["error"] != UPLOAD_ERR_OK) {
        echo "Error al subir el archivo. Código de error: " . $fileInput["error"];
        return false;
    }

    // Comprueba formato del archivo
    if (!in_array($fileInput["type"], $allowedMimeTypes)) {
        echo "Tipo de archivo no permitido.";
        return false;
    }

    // Comprueba tamaño del archivo
    if ($fileInput["size"] > $maxFileSize) {
        echo "El archivo es demasiado grande.";
        return false;
    }

    // Genera un nombre para el archivo subido
    $fileName = uniqid() . "." . pathinfo($fileInput["name"], PATHINFO_EXTENSION);

    // Muevo el archivo subido al directorio de imagenes
    if (!move_uploaded_file($fileInput["tmp_name"], $targetDir . $fileName)) {
        echo "Error al mover el archivo subido.";
        return false;
    }

    // Devolver el nombre del archivo subido
    return $fileName;
}
/*
Función que nos dice si un producto tiene imagen o no dado un id de producto
(Función para la pagina de modificación/creación de productos)
La muestra si tiene imagen y un botón para eliminarla.
*/
function haveImage($prod_id)
{
    if (!is_null(getProduct($prod_id)["var_product_image"])) {
        $imageUrl = "../uploads/product_images/" . getProduct($prod_id)["var_product_image"];
        echo ($imageUrl == "../uploads/product_images/" || $imageUrl == null) ? "" : "<img src='$imageUrl' id='product_preview' width='400px'><a class='buttonDanger' href='product_modify.php?id=$prod_id&deleteImage=1'>Eliminar Imagen</a>";
    }
}
//Función para eliminar una imagen de producto dado un id de producto
//Elimina también la imagen del directorio de imágenes
function deleteImage($prod_id)
{
    $imageRoute = "../uploads/product_images/" . getProduct($prod_id)["var_product_image"];
    unlink($imageRoute);
    $query = "UPDATE db_products SET var_product_image= NULL WHERE var_id=:prod_id;";
    $preQuery = db()->prepare($query);

    $preQuery->bindValue(":prod_id", $prod_id, PDO::PARAM_INT);

    $preQuery->execute();
}
