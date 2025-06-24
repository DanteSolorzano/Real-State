<?php

    //database
    require '../../includes/config/database.php';

    $db = connectionDb();


    require '../../includes/functions.php';

    includeTemplates('header');
?>


    <main class="container section">
        <h1>Create</h1>

        <a href="/admin" class="button green-button">Back</a>

        <form class="form" method="POST" action="/admin/properties/create.php">

            <fieldset>
                <legend>General Property Information</legend>

                <label for="tittle">Tittle:</label>
                <input type="text" name="tittle" id="tittle" placeholder="Propertie tittle">

                <label for="tittle">Price:</label>
                <input type="number" name="price" id="price" placeholder="Propertie price">

                <label for="image">Image:</label>
                <input type="file" id="image" accept="image/jpeg, image/png">

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
            </fieldset>
            <fieldset>
                <legend>Propertie Details</legend>

                <label for="bedroom">Bedrooms:</label>
                <input type="number" name="bedrooms" id="bedroom" placeholder="e.g: 3" min="1" max="15">

                <label for="wc">Bathrooms:</label>
                <input type="number" name="wc" id="wc" placeholder="e.g: 2" min="1" max="15">

                <label for="parking">Parkin</label>
                <input type="number" name="parking" id="parking" placeholder="e.g: 3" min="1" max="15">

            </fieldset>

            <fieldset>
                <legend>Agent or Seller</legend>

                <select>
                    <option value="" disabled selected>-- Select --</option>

                    <option value="1">Dante</option>
                    <option value="2">Jashua</option>
                </select>
            </fieldset>
                <input type="submit" value="Create Propertie" class="button green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>