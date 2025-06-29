<?php
    require '../../includes/functions.php';
    $auth = isAuthenticated();

    if(!$auth){
        header('Location: /');
    }

    //validate the id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //database
    require '../../includes/config/database.php';
    $db = connectionDb();

    //obtain data of the propertie

    $consultId = "SELECT * FROM properties WHERE id = {$id}";
    $resultId = mysqli_query($db, $consultId);
    $propertie = mysqli_fetch_assoc($resultId);

    //consult agents

    $consult = "SELECT * FROM sellers";
    $result = mysqli_query($db, $consult);

    //Arreglo con mensajes de errores
    $errors = [];

        $title = $propertie['title'];
        $price = $propertie['price'];
        $description = $propertie['description'];
        $bedrooms = $propertie['bedrooms'];
        $wc = $propertie['wc'] ;
        $parking = $propertie['parking'];
        $seller_id = $propertie['sellers_id'];
        $imagePropertie = $propertie['image'];
        

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

             //create a directory
             $image_directory = '../../images/';


            if(!is_dir($image_directory)){
                mkdir($image_directory);
            }

            $image_name = '';

            //Upload files
            if($image['name']){
                //delate previus image
                
                unlink($image_directory . $propertie['image']);

                    // Get extension of the file
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); // Ej: "jpg", "png"

                //generate a unique name
                $image_name = md5( uniqid(rand( ), true )) . '.' . $extension;
    
                move_uploaded_file($image['tmp_name'], $image_directory . $image_name);
            } else {
                $image_name = $propertie['image'];
            }

             

            $query = "UPDATE properties SET title = '{$title}', price = '{$price}', image = '{$image_name}', description = '{$description}', bedrooms = {$bedrooms}, wc = {$wc}, parking = {$parking}, sellers_id = {$seller_id} WHERE id = {$id}";

            //insert on the database
            $resultado = mysqli_query($db, $query);
    
             if($resultado){
                 //redirect the user after create a propertie

                 header('Location: /admin?resultCreate=2');
              }

        }
        
    }


    includeTemplates('header');
?>


    <main class="container section">
        <h1>Update Propertie</h1>
        <a href="/admin" class="button green-button">Back</a>


        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>


        <form class="form" method="POST" enctype="multipart/form-data">

            <fieldset>
                <legend>General Property Information</legend>

                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="Propertie title" value="<?php echo $title; ?>">

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" placeholder="Propertie price" value="<?php echo $price; ?>">

                <label for="image">Image:</label>
                <input name="image" type="file" id="image" accept="image/jpeg, image/png">

                <label>Current Image:</label>
                <img src="/images/<?php echo $imagePropertie;?>" class="image-small">

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
                <input type="submit" value="Update Propertie" class="button green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>