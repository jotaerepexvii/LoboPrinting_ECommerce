<?php
    $target_dir = "../../images/lobo_products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["add"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "El archivo es una imagen - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Ya hay una imagen con este nombre. Cree un nombre adecuado para la imagen";
        $uploadOk = 0;
    }

    // Check file size | 4k kilobytes or 4mb limit
    if ($_FILES["fileToUpload"]["size"] > 4000000) {
        echo "La imagen es muy grande. Favor subir una imagen menor de 4 megabytes";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "svg") {
        echo "Solo se permiten imagenes .JPG, .JPEG, .PNG o .SVG";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "La imágen es un formato desconocido";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "La imagen: ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " fue guardada.";
    } else {
        echo "Se produjo un error al guardar la imagen";
    }
    }
?>