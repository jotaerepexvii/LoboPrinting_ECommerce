<?php
    echo "Start";
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpLoc = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowedExt = array('jpg', 'jpeg', 'png', 'webp', 'svg');

        if(in_array($fileActExt, $allowedExt)){//if the extension in the supported types
            if ($fileError === 0){
                if($fileSize < 5242880){
                    $newFileName = uniqid('', true).".".$fileActExt;

                    $fileDestination = '../../FrontEnd/images/lobo_products/'.$newFileName;
                    move_uploaded_file($fileTmpLoc, $fileDestination);
                    echo "Success";
                    header("Location: ../productos.php");
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
    else
        echo "<br>End";
?>



<?php
//php de productos nuevos
        if(isset($_POST['submit']))
        {
            $errors = array();

            $product_id = (int)$_POST['product_id'];
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $price = filter_input(INPUT_POST, 'price');
            $cost = filter_input(INPUT_POST, 'cost');
            $in_stock = filter_input(INPUT_POST, 'in_stock');
            $sold = 0;
            $dateAdded = date("Y-m-d");
            $image = "1";

            if (empty($_POST['product_id']) || empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['cost']) || empty($_POST['in_stock']))
            {
              array_push($errors, 'Todo Los Campos Son Requeridos');
            }
            else if(count($errors) == 0)
            {
                $query_insert = mysqli_query($dbc, "INSERT INTO Product(product_id, name, description, price, cost, in_stock, sold, date, image)
                VALUES('$product_id','$name','$description','$price','$cost', '$in_stock', '$sold', '$dateAdded', $image)");

                if($query_insert)
                {
                    header("Location: productos-detalles.php?product_id=$product_id");
                    mysqli_close($dbc);
                }
                else	
                {
                    echo "Error: " . $query_insert . "<br>" . mysqli_error($dbc);
                }  
            }
            else	  
                echo '<script>alert("ERROR:Variables")</script>';
        }
        else if(isset($_POST['discard']))
        {
            header("Location: productos.php");
        }

?>