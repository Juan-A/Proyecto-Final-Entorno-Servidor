<?php
require_once("inc/inc_admin_global.php");

function uploadProductImage($fileInput)
{
    $target_dir = "../uploads/product_images/";
    $target_file = $target_dir . basename($fileInput["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
        $check = getimagesize($fileInput["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
}
function haveImage($prod_id){
    $imageUrl = getProduct($prod_id)["var_product_image"];
    echo ($imageUrl == "" || $imageUrl == null) ? "" : "<img src='$imageUrl' id='product_preview'>";
}
