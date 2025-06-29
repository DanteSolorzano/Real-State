<?php

require '../includes/functions.php';
$auth = isAuthenticated();

if(!$auth){
    header('Location: /');
}

    //import the db connection
    require '../includes/config/database.php';
    $db = connectionDb();

    //write the query
    $query = "SELECT * FROM properties;";

    //consult the db

    $consultResult = mysqli_query($db, $query);

    //show a conditional message
    $resultCraete = $_GET['resultCreate'] ?? null;

    //Code to delete
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            //delete the image from the directory
            $query = "SELECT image FROM properties WHERE id = {$id}";

            $result = mysqli_query($db, $query);
            $propertie = mysqli_fetch_assoc($result);

            unlink('../images/' . $propertie['image']);

            //delate the propertie on the db

            $query = "DELETE FROM properties WHERE id = {$id}";

            $result = mysqli_query($db, $query);

            if($result){
                header('location: /admin?resultCreate=3');
            }
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
                <?php while($propertie = mysqli_fetch_assoc($consultResult)): ?>
            <tr>
                <td> <?php echo $propertie['id']; ?>  </td>
                    <td><?php echo $propertie['title']; ?></td>
                    <td><img class="table-image" src="/images/<?php echo $propertie['image']; ?>" alt="image of property"></td>
                    <td>$<?php echo $propertie['price']; ?></td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $propertie['id'] ?>">

                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a class="yellow-button-block" href="/admin/properties/update.php?id=<?php echo $propertie['id']; ?>  ">Update</a>
                    </td>
            </tr>

                <?php endwhile; ?>
            </tbody>
        </table>

    </main>

    <?php 

    //close the db connection
    mysqli_close($db);

    includeTemplates('footer');


?>