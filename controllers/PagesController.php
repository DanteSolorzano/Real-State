<?php 

namespace Controllers;

use MVC\Router;
use Model\Propertie;
use PHPMailer\PHPMailer\PHPMailer;

class PagesController {

    public static function index( Router $router) {

        $properties = Propertie::get(3);
        $home = true;
        
        $router->render('pages/index', [
            'properties' => $properties,
            'home' => $home
        ]);
    }

    public static function aboutUs( Router $router) {
        $router->render('pages/aboutUs', [

        ]);
    }

    public static function announcements(Router $router) {

        $properties = Propertie::all();

        $router->render('pages/announcements', [
            'properties'=>$properties
        ]);
    }

    public static function announcement( Router $router) {
        $id = validateOrRedirect('/annoucements');

        //find property
        $propertie = Propertie::find($id);


        $router->render('pages/announcement', [
            'propertie'=>$propertie
        ]);
    }
    
    public static function blog( Router $router ) {
        $router->render('pages/blog', [

        ]);
    }

    public static function entrada( Router $router) {
        $router->render('pages/entrada', [

        ]);
    }

    public static function contact( Router $router) {

        $message = null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $response = $_POST['contact'];
            


            //crate an instance of php mailler
            $mail = new PHPMailer();

            //configurate mspt
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username ='c5218530ff1ecd';
            $mail->Password = '0d7a344f4b2ae0';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configure mail content
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //define content
            $content = '<html>';
            $content .= '<h2>Tienes un nuevo mensaje</h2>';
            $content .= '<p>Nombre: ' . $response['name'] . '</p>';
            
            // Condicional para mostrar email o teléfono según la preferencia elegida
            if ($response['contact'] === 'tel') {
                $content .= '<p>Eligió ser contactado por Teléfono:</p>';
                $content .= '<p>Teléfono: ' . $response['phoneNumber'] . '</p>';
                $content .= '<p>Fecha de contacto: ' . $response['date'] . '</p>';
                $content .= '<p>Hora de contacto: ' . $response['time'] . '</p>';
            } else {
                $content .= '<p>Eligió ser contactado por Email:</p>';
                $content .= '<p>Email: ' . $response['email'] . '</p>';
            }

            $content .= '<p>Mensaje: ' . $response['Message'] . '</p>'; // Nota: Con 'M' mayúscula según tu HTML
            $content .= '<p>Vende o Compra: ' . $response['type'] . '</p>';
            $content .= '<p>Precio o Presupuesto: $' . $response['price'] . '</p>';
            $content .= '</html>';

            $mail->Body = $content;
            $mail->AltBody = 'Esto es texto alternativo sin html';

            //send email
            if($mail->send()){
                 $message = "Mensaje enviado correctamente";
             } else {
                 $message = "El mensaje no se pudo enviar";
             }

        }
        
        
        $router->render('pages/contact',[
            'message' => $message
        ]);
    }

}