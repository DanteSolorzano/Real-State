 <fieldset>
                <legend>General Information</legend>

                <label for="name">Name:</label>
                <input type="text" name="seller[name]" id="name" placeholder="Seller name" value="<?php echo s ( $seller->name ); ?>">

                <label for="lastname">Lastname:</label>
                <input type="text" name="seller[lastname]" id="lastname" placeholder="Seller lastname" value="<?php echo s ( $seller->lastname ); ?>">

  </fieldset>

 <fieldset>

                <legend>Extra Information</legend>

                <label for="phone_number">Phone Number:</label>
                <input type="text" name="seller[phone_number]" id="phone_number" placeholder="Seller's Phone Number" value="<?php echo s ( $seller->phone_number ); ?>">

 </fieldset>