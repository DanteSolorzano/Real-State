<main class="container section">
    <h1 data-translate="contacto-titulo">Contact</h1>

    <?php if($message) { ?>
        <p class='alert success'> <?php echo $message; ?> </p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Image Contact" loading="lazy">
    </picture>

    <h2 data-translate="contacto-llenar">Fill out the contact form</h2>

    <form class="form" action="/contact" method="POST">
        <fieldset>
            <legend data-translate="contacto-info-personal">Personal Information</legend>

            <label for="name" data-translate="contacto-label-nombre">Name</label>
            <input type="text" placeholder="Your Name" id="name" data-translate="contacto-ph-nombre" name="contact[name]" required>              
            
            <label for="message" data-translate="contacto-label-mensaje">Message</label>
            <textarea id="message" placeholder="Your message" data-translate="contacto-ph-mensaje" name="contact[Message]" required></textarea>
        </fieldset>

        <fieldset>
            <legend data-translate="contacto-propiedad">Property Details</legend>

            <label for="options" data-translate="contacto-label-opciones">Buy or Sell</label>
            <select id="options" name="contact[type]" required>
                <option value="" disabled selected data-translate="contacto-opcion-select">-- Select --</option>
                <option value="Buy" data-translate="contacto-opcion-compra">Buy</option>
                <option value="Sell" data-translate="contacto-opcion-venta">Sell</option>
            </select>

            <label for="estimate" data-translate="contacto-label-presupuesto" >Price or Estimate</label>
            <input type="number" id="estimate" placeholder="Your Price or Estimate" data-translate="contacto-ph-presupuesto" name="contact[price]" required>
        </fieldset>

        <fieldset>
            <legend data-translate="contacto-contacto">Contact</legend>

            <p data-translate="contacto-metodo">Preferred method of contact?</p>

            <div class="contact-method">
                <label for="tel-contact" data-translate="contacto-label-tel">Phone Call</label>
                <input type="radio" value="tel" id="tel-contact" name="contact[contact]" required>

                <label for="email-contact" data-translate="contacto-label-email">Email</label>
                <input type="radio" value="email" id="email-contact" name="contact[contact]" required>
            </div>

            <div id="contact"></div>
            
            

        </fieldset>

        <!-- El botón submit necesita traducción en su VALUE -->
        <input type="submit" value="Send" class="green-button" data-translate="contacto-boton">
    </form>

</main>