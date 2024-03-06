<?php
require_once("inc/inc_admin_global.php");

function uploadProductImage($fileInput) {
    // Configuración
    $targetDir = "../uploads/product_images/"; // Directorio destino donde se guardarán las imágenes subidas
    $allowedMimeTypes = ["image/jpeg", "image/png", "image/gif"]; // Tipos MIME permitidos
    $maxFileSize = 5000000; // Tamaño máximo de archivo permitido en bytes (5 MB en este ejemplo)

    // Comprobación de errores
    if ($fileInput["error"] != UPLOAD_ERR_OK) {
        echo "Error al subir el archivo. Código de error: " . $fileInput["error"];
        return false;
    }

    // Comprobación del tipo MIME
    if (!in_array($fileInput["type"], $allowedMimeTypes)) {
        echo "Tipo de archivo no permitido.";
        return false;
    }

    // Comprobación del tamaño del archivo
    if ($fileInput["size"] > $maxFileSize) {
        echo "El archivo es demasiado grande.";
        return false;
    }

    // Generar un nombre de archivo único
    $fileName = uniqid() . "." . pathinfo($fileInput["name"], PATHINFO_EXTENSION);

    // Mover el archivo subido al directorio de destino
    if (!move_uploaded_file($fileInput["tmp_name"], $targetDir . $fileName)) {
        echo "Error al mover el archivo subido.";
        return false;
    }

    // Devolver el nombre del archivo subido
    return $fileName;
}

function haveImage($prod_id){
    if(!is_null(getProduct($prod_id)["var_product_image"])){
        $imageUrl = "../uploads/product_images/".getProduct($prod_id)["var_product_image"];
        echo ($imageUrl == "../uploads/product_images/" || $imageUrl == null) ? "" : "<img src='$imageUrl' id='product_preview' width='400px'><a class='buttonDanger' href='product_modify.php?deleteImage=1'>Eliminar Imagen</a>";
    }    
}
