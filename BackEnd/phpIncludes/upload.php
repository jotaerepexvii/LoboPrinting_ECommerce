<?php
    /*
    $target_dir = "../FrontEnd/images/lobo_products/";
    
    $target_file = $target_dir . basename($_FILES["exampleInputFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a actual image
    if(isset($_POST["add"])) {
        $check = getimagesize($_FILES["exampleInputFile"]["tmp_name"]);
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
    if ($_FILES["exampleInputFile"]["size"] > 4000000) {
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
    if (move_uploaded_file($_FILES["exampleInputFile"]["tmp_name"], $target_file)) {
        echo "La imagen: ". htmlspecialchars( basename( $_FILES["exampleInputFile"]["name"])). " fue guardada.";
    } else {
        echo "Se produjo un error al guardar la imagen";
    }
    }
    */

    
    if(isset($_FILES['image'])){//Checks if file is set
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        //(above) checks file extension by getting text after last dot

        $expensions= array("jpeg","jpg","png");//supported file types

        if(in_array($file_ext,$expensions)=== false){//is the extension in the supported types
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152){//PHP only supports files under 2MB
            $errors[]='File size must be excately 2 MB';
        }

            //If there's no error moves files to folder "images" in the root of this file, else prints all the errors
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"images/".$file_name);
            echo "Success";
        }else{
            print_r($errors);
        }
    }




    if(isset($_POST['image'])){
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];

        $fileExt = explode('.',$fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowedExt = array('jpg', 'jpeg', 'png', 'webp', 'svg');

        if(in_array($fileExt, $allowedExt)){//if the extension in the supported types
            if ($fileError === 0){
                if($fileSize < 1000000){
                    $newFileName = uniqid;
                }
                else{
                    echo "File size too big";
                }
            }
            else{
                echo "Error uploading file";
            }
        }
        else{
            echo "extension not allowed, please choose a JPEG or PNG file.";
        }
    }
?>