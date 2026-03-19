<?php

    use App\Propertie;

    require '../../includes/app.php';

    isAuthenticated();

    //validate the id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //obtain data of the propertie
    $propertie = Propertie::find($id);



    //consult agents

    $consult = "SELECT * FROM sellers";
    $result = mysqli_query($db, $consult);

    //Arreglo con mensajes de errores
    $errors = [];

        

    //Ejecutar despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //assyng the attributes
        $args = $_POST['propertie'];

        $propertie->syncr($args);

        debugger($propertie);

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

                <?php include '../../includes/templates/properties_form.php'; ?>
           
                <input type="submit" value="Update Propertie" class="button green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>