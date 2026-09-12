<?php 

namespace MVC;

class Router {
    
    public $getRoutes = [];
    public $postRoutes = [];

    public function get($url, $fn){
        $this->getRoutes[$url] = $fn; 
    }

    public function post($url, $fn){
        $this->postRoutes[$url] = $fn; 
    }

    public function checkNavigation() {

        session_start();

        $auth = $_SESSION['login'] ?? null;
        //array of protected routers
        $protected_routes = ['/admin', '/properties/create', '/properties/delete', '/properties/update', 'sellers/create', '/sellers/update', '/sellers/delete'];


        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';        $metod = $_SERVER['REQUEST_METHOD'];

        if($metod === 'GET'){
            $fn = $this->getRoutes[$urlActual] ?? null;
        } else {
            $fn = $this->postRoutes[$urlActual] ?? null;
        }


        //protect the routers
        if(in_array($urlActual, $protected_routes) && !$auth ){
            header('Location: /');
        }

        if($fn) {
            //la url exisste y esta asociada
            call_user_func($fn, $this);
            
        } else {
            echo "pagina no encontrada o mostrar 404";
        }
    }

    //Show a view
    public function render($view, $data = []){

        foreach($data as $key => $value) {
            $$key = $value;
        };

        ob_start();
        include __DIR__ . "/views/$view.php";

        $content = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}