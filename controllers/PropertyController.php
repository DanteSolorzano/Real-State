<?php 

namespace Controllers;
use MVC\Router;
use Model\Propertie;
use Model\Seller;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class PropertyController {

    //pasa la referencia del router ya creado en index
    public static function index(Router $router) {
        $properties = Propertie::all();
        $sellers = Seller::all();


        $resultMessage = $_GET['resultCreate'] ?? null;

        $router->render('properties/admin', [
            'properties' => $properties,
            'resultMessage' => $resultMessage,
            'sellers' => $sellers
        ]);
    }

    public static function create(Router $router) {
        $propertie = new Propertie;
        $sellers = Seller::all();
        $errors = Propertie::getErrors();   

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propertie = new Propertie($_POST['propertie']);

            //generate a unique name
            $image_name = md5( uniqid(rand( ), true )) . '.jpg';

            if(isset($_FILES['propertie']['tmp_name']['image']) && $_FILES['propertie']['tmp_name']['image']) {
                $manager = new Image(new Driver()); // Corregido: instancia del Driver
                $image = $manager->read($_FILES['propertie']['tmp_name']['image'])->cover(800, 600);  
                $propertie->setImage($image_name);
            }

            $errors = $propertie->validate();
            
            if(empty($errors)) {
                if(!is_dir(IMAGES_FILE)) {
                    mkdir(IMAGES_FILE);
                }
                // Save the image in the server
                $image->save(IMAGES_FILE . $image_name);
                $propertie->save();
            }
        }

        $router->render('properties/create', [
            'propertie' => $propertie,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router) {
        $id = validateOrRedirect('/admin');
        
        $propertie = Propertie::find($id);
        $sellers = Seller::all();
        $errors = Propertie::getErrors();

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
            if(isset($_FILES['propertie']['tmp_name']['image']) && $_FILES['propertie']['tmp_name']['image']){
                
                $image->save(IMAGES_FILE . $image_name);
            }

            $propertie->save();
        }
    }

        $router->render('/properties/update', [
            'propertie' => $propertie,
            'errors' => $errors,
            'sellers' => $sellers
        ]);
    }

    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];

            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){

                $type = $_POST['type'];

                if(validateTypeOfContent($type)){
                    $propertie = Propertie::find($id);
                    $propertie->delete();
                }        
            }
        }
    }
}