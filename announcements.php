<?php

    require 'includes/functions.php';

    includeTemplates('header');
?>

    <main class="container section">
        <h1>Property Listings</h1>
        <?php 

            $limit_properties = 15;
            include 'includes/templates/announcements.php';
        ?>
    </main>

    <?php include 'includes/templates/footer.php' ?>