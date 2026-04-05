<?php

    use App\Propertie;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager as Image;

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
    $errors = Propertie::getErrors();

        

    //Ejecutar despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //assyng the attributes
        $args = $_POST['propertie'];

        $propertie->syncr($args);

        $errors = $propertie->validate();

            //generate a unique name
        $image_name = md5( uniqid(rand( ), true )) . '.jpg';

        //upload files
        if(isset($_FILES['propertie']['tmp_name']['image']) && $_FILES['propertie']['tmp_name']['image']){
                
                $manager = new Image(Driver::class);
                // También aplicamos el orden correcto aquí adentro
                $image = $manager->read($_FILES['propertie']['tmp_name']['image'])->cover(800, 600);  
                $propertie->setImage($image_name);
        }

        //validate the 
        if(empty($errors)){

            //save the image in the disc
            $image->save(IMAGES_FILE . $image_name);

            $result = $propertie->save();
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