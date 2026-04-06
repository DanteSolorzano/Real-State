<?php

require '../includes/app.php';
isAuthenticated();

use App\Propertie;
use App\Seller;

    //implement a method to obtain all the properties
    $properties = Propertie::all();
    $sellers = Seller::all();
    

    //show a conditional message
    $resultMessage = $_GET['resultCreate'] ?? null;

    //Code to delete
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){

            $type = $_POST['type'];

            if(validateTypeOfContent($type)){

                //compare what we going to delete
                if($type === 'seller'){
                    $seller = Seller::find($id);
                    $seller->delete();
                } else if($type === 'propertie'){
                    $propertie = Propertie::find($id);
                    $propertie->delete();
                }
            }        
        }
    }

    //add a template
    includeTemplates('header');
?>


    <main class="container section">
        <h1>Admin of Real State</h1>

        <?php 
            $message = showMessage(intval($resultMessage) );
            if($message) { ?>
                <p class="alert success"><?php echo s($message) ?> </p>
            <?php } ?>

        <a href="/admin/properties/create.php" class="button green-button">New Propertie</a>
        <a href="/admin/sellers/create.php" class="button green-button">New Seller</a>


        <h2>Properties</h2>
        <table class="properties">
            <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>IMAGE</th>
                <th>PRICE</th>
                <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody> <!-- Show the results -->
                <?php foreach( $properties as $propertie ): ?>
            <tr>
                <td> <?php echo $propertie->id; ?>  </td>
                    <td><?php echo $propertie->title; ?></td>
                    <td><img class="table-image" src="/images/<?php echo $propertie->image; ?>" alt="image of property"></td>
                    <td>$<?php echo $propertie->price; ?></td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $propertie->id; ?>">
                            <input type="hidden" name="type" value="propertie">

                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a class="yellow-button-block" href="/admin/properties/update.php?id=<?php echo $propertie->id; ?>  ">Update</a>
                    </td>
            </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Sellers</h2>

         <table class="properties">
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PHONE #</th>
                <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody> <!-- Show the results -->
                <?php foreach( $sellers as $seller ): ?>
            <tr>
                <td> <?php echo $seller->id; ?>  </td>
                    <td><?php echo $seller->name . " " . $seller->lastname; ?></td>
                    <td><?php echo $seller->phone_number; ?></td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $seller->id; ?>">
                            <input type="hidden" name="type" value="seller">


                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a class="yellow-button-block" href="/admin/sellers/update.php?id=<?php echo $seller->id; ?>  ">Update</a>
                    </td>
            </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <?php 

    includeTemplates('footer');


?>