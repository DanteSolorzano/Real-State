<?php
    require '../../includes/app.php';
    use App\Propertie;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager as Image;

    isAuthenticated();   

    //database
    $db = connectionDb();

    $propertie = new Propertie;

    //consult agents

    $consult = "SELECT * FROM sellers";
    $result = mysqli_query($db, $consult);

    //Arreglo con mensajes de errores
    $errors = Propertie::getErrors();


        

    //Ejecutar despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){


        $propertie = new Propertie($_POST['propertie']);

        //generate a unique name
        $image_name = md5( uniqid(rand( ), true )) . '.jpg';

        if(isset($_FILES['propertie']['tmp_name']['image']) && $_FILES['propertie']['tmp_name']['image']){
            
            $manager = new Image(Driver::class);
            // También aplicamos el orden correcto aquí adentro
            $image = $manager->read($_FILES['propertie']['tmp_name']['image'])->cover(800, 600);  
            $propertie->setImage($image_name);
        }



        $errors = $propertie->validate();


        
        if(empty($errors)){


            if(!is_dir(IMAGES_FILE)){
                mkdir(IMAGES_FILE);
            }
            // Save the image in the server
            $image->save(IMAGES_FILE . $image_name);


            $propertie->save();

        }
        
    }


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

                <?php include '../../includes/templates/properties_form.php'; ?>
           
                <input type="submit" value="Create Propertie" class="button green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>