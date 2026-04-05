 <fieldset>
                <legend>General Property Information</legend>

                <label for="title">Title:</label>
                <input type="text" name="propertie[title]" id="title" placeholder="Propertie title" value="<?php echo s ( $propertie->title ); ?>">

                <label for="price">Price:</label>
                <input type="number" name="propertie[price]" id="price" placeholder="Propertie price" value="<?php echo s($propertie->price); ?>">

                <label for="image">Image:</label>
                <input name="propertie[image]" type="file" id="image" accept="image/jpeg, image/png">

                <?php if($propertie->image) { ?>
                    <img src="/images/<?php echo $propertie->image ?>" class="image-small"> 
                <?php } ?>

                <label for="description">Description:</label>
                <textarea id="description" name="propertie[description]"><?php echo s( $propertie->description); ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Propertie Details</legend>

                <label for="bedroom">Bedrooms:</label>
                <input type="number" name="propertie[bedrooms]" id="bedroom" placeholder="e.g: 3" min="1"  max="15" value="<?php echo s($propertie->bedrooms); ?>">

                <label for="wc">Bathrooms:</label>
                <input type="number" name="propertie[wc]" id="wc" placeholder="e.g: 2" min="1" max="15" value="<?php echo s( $propertie->wc); ?>">

                <label for="parking">Parking</label>
                <input type="number" name="propertie[parking]" id="parking" placeholder="e.g: 3" min="1" max="15" value="<?php echo s($propertie->parking); ?>">

            </fieldset>

            <fieldset>
                <legend>Agent or Seller</legend>

            
            </fieldset>