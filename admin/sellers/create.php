<?php
    require '../../includes/app.php';

    use App\Seller;

    isAuthenticated();

    $seller = new Seller;

     //Arreglo con mensajes de errores
    $errors = Seller::getErrors();

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

    includeTemplates('header');

?>

<main class="container section">
        <h1>Register A New Seller</h1>
        <a href="/admin" class="button green-button">Back</a>


        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>


        <form class="form" method="POST" action="/admin/sellers/create.php">

                <?php include '../../includes/templates/sellers_form.php'; ?>
           
                <input type="submit" value="Register A New Seller" class="button green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>
