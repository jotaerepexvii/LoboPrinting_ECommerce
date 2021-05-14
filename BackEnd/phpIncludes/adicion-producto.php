<?php
    session_start();
    include 'connection.php';

    if(isset($_POST['submit'])){
        
        $errors = array();

        $product_id = (int)$_POST['product_id'];
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price');
        $cost = filter_input(INPUT_POST, 'cost');
        $in_stock = filter_input(INPUT_POST, 'in_stock');
        $sold = 0;
        $dateAdded = date("Y-m-d");

        $name = preg_replace('/[^a-zA-Z0-9 ]/', '', $name);
        $description = preg_replace('/[^a-zA-Z0-9 ]/', '', $description);

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpLoc = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowedExt = array('jpg', 'jpeg', 'png', 'webp', 'svg');

        if (empty($_POST['product_id']) || empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['cost']) || empty($_POST['in_stock']))
        {
            array_push($errors, 'Todos Los Campos Son Requeridos');
            echo("  <script>
                        if (confirm('Todos Los Campos Son Requeridos')) {
                            history.go(-1);
                        }
                        else{
                            history.go(-1);
                        }
                    </script>");
        }
        else if(count($errors) == 0)
        {
            if(in_array($fileActExt, $allowedExt)){//if the extension in the supported types
                if ($fileError === 0){
                    if($fileSize < 5242880){    //if less than 5mb
                        $newFileName = $product_id.".".$fileActExt;
                        $fileDestination = '../../FrontEnd/images/lobo_products/'.$newFileName;

                        $query_insert = mysqli_query($dbc, "INSERT INTO Product(product_id, name, description, price, cost, in_stock, sold, date, image)
                        VALUES('$product_id','$name','$description','$price','$cost', '$in_stock', '$sold', '$dateAdded', '$newFileName')");

                        if($query_insert){
                            move_uploaded_file($fileTmpLoc, $fileDestination);
                            echo("  
                                <script>
                                    if (confirm('El producto fue añadido')) {
                                        location.href = '../productos-detalles.php?product_id=$product_id';
                                    }
                                    else{
                                        location.href = '../productos-detalles.php?product_id=$product_id';
                                    }
                                </script>
                            ");
                            mysqli_close($dbc);
                        }
                        else{
                            echo "Error: " . $query_insert . "<br>" . mysqli_error($dbc);
                        }  
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
    }
    else if(isset($_POST['discard'])){
        header("Location: productos.php");
    }
?>