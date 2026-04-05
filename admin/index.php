<?php

require '../includes/app.php';
isAuthenticated();

use App\Propertie;

    //implement a method to obtain all the properties
    $properties = Propertie::all();
    

    //show a conditional message
    $resultCraete = $_GET['resultCreate'] ?? null;

    //Code to delete
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){

            $propertie = Propertie::find($id);

            $propertie->delete();

     




           
        }

    }

    //add a template
    includeTemplates('header');
?>


    <main class="container section">
        <h1>Admin of Real State</h1>

        <?php if( intval($resultCraete) === 1): ?>
            <p class="alert success">The property has been added successfully.</p>
            <?php elseif( intval($resultCraete) === 2): ?>
                <p class="alert success">The property has been updated successfully.</p>
                <?php elseif( intval($resultCraete) === 3): ?>
                    <p class="alert success">The property has been deleted successfully.</p>

        <?php endif; ?>


        <a href="/admin/properties/create.php" class="button green-button">New Propertie</a>



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

                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a class="yellow-button-block" href="/admin/properties/update.php?id=<?php echo $propertie->id; ?>  ">Update</a>
                    </td>
            </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <?php 

    //close the db connection
    mysqli_close($db);

    includeTemplates('footer');


?>