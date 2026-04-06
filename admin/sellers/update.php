<?php
    require '../../includes/app.php';

    use App\Seller;

    isAuthenticated();

    //validate the id

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    //obtain the array of seller
    $seller = Seller::find($id);

    //Arreglo con mensajes de errores
    $errors = Seller::getErrors();

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

    includeTemplates('header');

?>

<main class="container section">
        <h1>Update a Seller</h1>
        <a href="/admin" class="button green-button">Back</a>


        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>


        <form class="form" method="POST" action="">

                <?php include '../../includes/templates/sellers_form.php'; ?>
           
                <input type="submit" value="Save Changes" class="button green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>
