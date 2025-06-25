<?php

    //database
    require '../../includes/config/database.php';
    $db = connectionDb();

    //consult agents

    $consult = "SELECT * FROM sellers";
    $result = mysqli_query($db, $consult);

    //Arreglo con mensajes de errores
    $errors = [];

        $title = '';
        $price = '';
        $description = '';
        $bedrooms = '';
        $wc = '';
        $parking = '';
        $seller_id = '';
        

    //Ejecutar despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //  echo "<pre>";
        // var_dump($_FILES);
        //  echo "</pre>";

        $title = mysqli_real_escape_string( $db, $_POST['title']);
        $price = mysqli_real_escape_string( $db, $_POST['price']);
        $description = mysqli_real_escape_string( $db, $_POST['description']);
        $bedrooms = mysqli_real_escape_string( $db, $_POST['bedrooms']);
        $wc = mysqli_real_escape_string( $db, $_POST['wc']);
        $parking = mysqli_real_escape_string( $db, $_POST['parking']);
        $seller_id = mysqli_real_escape_string( $db, $_POST['seller'] ?? '');
        $created_at = date('Y/m/d');

        //asign files to a variable
        $image = $_FILES['image'];


        if(!$title){
            $errors[] = 'a title is required';
        } elseif (strlen($title) > 45) {  // Asegurar que no supere 45 caracteres
            $errors[] = 'The title cannot exceed 45 characters';
        }

        if(!$price){
            $errors[] = 'a price is required';
        }

        if(strlen($description) < 50){
            $errors[] = 'a description is required and must be at least 50 characters long';
        }

        if(empty($_FILES['image']['name']) || $_FILES['image']['size'] === 0) {
            $errors[] = 'You must select an image file';
        } 

        if(!$bedrooms){
            $errors[] = 'The number of bedrooms is required';
        }

        if(!$wc){
            $errors[] = 'The number of wc is required';
        }

        if(!$parking){
            $errors[] = 'The number of parking is required';
        }

        if(!$seller_id){
            $errors[] = 'You have to select a seller or agent';
        }

        //validate image by size 
        $size = 2 * 1024 * 1024;

        if($image['size']>$size){
            $errors[] = 'Image file size is too large.';
        }

        

        // echo "<pre>";
        // var_dump($errors);     
        // echo "</pre>";

        //validate the 
        if(empty($errors)){

            //Upload files

            //create a directory
            $image_directory = '../../images/';


            if(!is_dir($image_directory)){
                mkdir($image_directory);
            }

            // Get extension of the file
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); // Ej: "jpg", "png"

            //generate a unique name
            $image_name = md5( uniqid(rand( ), true )) . '.' . $extension;

            move_uploaded_file($image['tmp_name'], $image_directory . $image_name);

            $query = "INSERT INTO properties (title, price, image, description, bedrooms, wc, parking, created_at, sellers_id) VALUES ('$title', '$price', '$image_name', '$description', '$bedrooms', '$wc', '$parking', '$created_at', '$seller_id' )";

            //insert on the database
            $resultado = mysqli_query($db, $query);
    
             if($resultado){
                 //redirect the user after create a propertie

                 header('Location: /admin?resultCreate=1');
              }

        }
        
    }


    require '../../includes/functions.php';
    includeTemplates('header');
?>


    <main class="container section">
        <h1>Create Propertie</h1>
        <a href="/admin" class="button green-button">Back</a>


        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>


        <form class="form" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">

            <fieldset>
                <legend>General Property Information</legend>

                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="Propertie title" value="<?php echo $title; ?>">

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" placeholder="Propertie price" value="<?php echo $price; ?>">

                <label for="image">Image:</label>
                <input name="image" type="file" id="image" accept="image/jpeg, image/png">

                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo $description; ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Propertie Details</legend>

                <label for="bedroom">Bedrooms:</label>
                <input type="number" name="bedrooms" id="bedroom" placeholder="e.g: 3" min="1"  max="15" value="<?php echo $bedrooms; ?>">

                <label for="wc">Bathrooms:</label>
                <input type="number" name="wc" id="wc" placeholder="e.g: 2" min="1" max="15" value="<?php echo $wc; ?>">

                <label for="parking">Parkin</label>
                <input type="number" name="parking" id="parking" placeholder="e.g: 3" min="1" max="15" value="<?php echo $parking; ?>">

            </fieldset>

            <fieldset>
                <legend>Agent or Seller</legend>

                <select name="seller">
                    <option value="" disabled selected>-- Select --</option>

                    <?php while($row = mysqli_fetch_assoc($result)) : ?>

                        <option <?php echo $seller_id === $row['id'] ? 'selected' : ''; ?>   value="<?php echo $row['id']; ?>"> <?php echo $row['name'] . " " . $row['lastname'] ; ?></option>
                    
                        <?php endwhile; ?>
                    
                </select>
            </fieldset>
                <input type="submit" value="Create Propertie" class="button green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>