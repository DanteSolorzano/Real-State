<?php
    require '../../includes/app.php';

    use App\Propertie;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

    isAuthenticated();

    

    //database
    $db = connectionDb();

    //consult agents

    $consult = "SELECT * FROM sellers";
    $result = mysqli_query($db, $consult);

    //Arreglo con mensajes de errores
    $errors = Propertie::getErrors();

    //debugger($errors);

        $title = '';
        $price = '';
        $description = '';
        $bedrooms = '';
        $wc = '';
        $parking = '';
        $seller_id = '';
        

    //Ejecutar despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $propertie = new Propertie($_POST);

        //generate a unique name
        $image_name = md5( uniqid(rand( ), true )) . '.jpg';
        if($_FILES['image']['tmp_name']){
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['image']['tmp_name'])->cover(800, 600);
            $propertie->setImage($image_name);
        }



        $errors = $propertie->validate();


        
        if(empty($errors)){


            if(!is_dir(IMAGES_FILE)){
                mkdir(IMAGES_FILE);
            }
            // Save the image in the server
            $image->save(IMAGES_FILE . $image_name);


            $resultado = $propertie->save();
    
             if($resultado){
                 //redirect the user after create a propertie

                 header('Location: /admin?resultCreate=1');
              }

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

                <label for="parking">Parking</label>
                <input type="number" name="parking" id="parking" placeholder="e.g: 3" min="1" max="15" value="<?php echo $parking; ?>">

            </fieldset>

            <fieldset>
                <legend>Agent or Seller</legend>

                <select name="sellers_id">
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