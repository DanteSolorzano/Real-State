<?php

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }

    //import connection
    require 'includes/config/database.php';
    $db = connectionDb();

    //consult
    $query = "SELECT * FROM properties WHERE id = {$id}";

    //get result
    $result = mysqli_query($db, $query);

    //validate result
    if($result->num_rows === 0){
        header('Location: /');
    }


    $propertie = mysqli_fetch_assoc($result);




    require 'includes/functions.php';

    includeTemplates('header');
?>


    <main class="container section content-center">
        <h1><?php echo $propertie['title']; ?></h1>

        <img loading="lazy" src="/images/<?php echo $propertie['image']; ?>" alt="propertie image">
        

        <div class="property-overview">
            <p class="price">$<?php echo $propertie['price']; ?></p>

                    <ul class="feature-icons">
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                            <p><?php echo $propertie['parking']; ?></p>
                        </li> 
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                            <p><?php echo $propertie['bedrooms']; ?></p>
                        </li>   
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                            <p><?php echo $propertie['wc']; ?></p>
                        </li>                          
                    </ul>
                    <p><?php echo $propertie['description']; ?></p>
        </div>

    </main>

<?php 

    mysqli_close($db);

    includeTemplates('footer');
?>