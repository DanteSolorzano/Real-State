<?php
namespace Controllers;

use MVC\Router;
use Model\Seller;

class SellerController {
    public static function create( Router $router) {

        $errors = Seller::getErrors();
        $seller = new Seller;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //generate a new instance
            $seller = new Seller($_POST['seller']);

            //validate the data
            $errors = $seller->validate();

            //there is no mistakes
            if(empty($errors)){
                $seller->save();
            }

        } 

        $router->render('sellers/create', [
            'errors' => $errors,
            'seller' => $seller
        ]);
    }

    public static function update( Router $router) {
        $errors = Seller::getErrors();
        $id = validateOrRedirect('/admin');

        //obtener datos del avendedor a actualizar
        $seller = Seller::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //asing the values
        $args = $_POST['seller'];

        //sync the object in memory
        $seller->syncr($args);

        $errors = $seller->validate();

        if(empty($errors)){
            $seller->save();
        }
        } 

        $router->render('sellers/update', [
            'errors' => $errors,
            'seller' => $seller

        ]);
    }

    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           $id = $_POST['id'];
           $id = filter_var($id, FILTER_VALIDATE_INT);
           
           if($id){
                $type = $_POST['type'];

                if(validateTypeOfContent($type)){
                    $seller = Seller::find($id);
                    $seller->delete();
                }
           }
        }
    }
}