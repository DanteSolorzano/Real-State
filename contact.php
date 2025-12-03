<?php
    require 'includes/functions.php';
    includeTemplates('header');
?>

<main class="container section">
    <h1 data-translate="contacto-titulo">Contact</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Image Contact" loading="lazy">
    </picture>

    <h2 data-translate="contacto-llenar">Fill out the contact form</h2>

    <form class="form">
        <fieldset>
            <legend data-translate="contacto-info-personal">Personal Information</legend>

            <label for="name" data-translate="contacto-label-nombre">Name</label>
            <input type="text" placeholder="Your Name" id="name" data-translate="contacto-ph-nombre">

            <label for="email" data-translate="contacto-label-email">E-mail</label>
            <input type="email" placeholder="Your E-mail" id="email" data-translate="contacto-ph-email">

            <label for="phoneNumber" data-translate="contacto-label-tel">Phone number</label>
            <input type="tel" placeholder="Your Phone Number" id="phoneNumber" data-translate="contacto-ph-tel">
            
            <label for="message" data-translate="contacto-label-mensaje">Message</label>
            <textarea name="message" id="message" placeholder="Your message" data-translate="contacto-ph-mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend data-translate="contacto-propiedad">Property Details</legend>

            <label for="options" data-translate="contacto-label-opciones">Buy or Sell</label>
            <select name="" id="options">
                <option value="" disabled selected data-translate="contacto-opcion-select">-- Select --</option>
                <option value="Buy" data-translate="contacto-opcion-compra">Buy</option>
                <option value="Sell" data-translate="contacto-opcion-venta">Sell</option>
            </select>

            <label for="estimate" data-translate="contacto-label-presupuesto">Price or Estimate</label>
            <input type="number" id="estimate" placeholder="Your Price or Estimate" data-translate="contacto-ph-presupuesto">
        </fieldset>

        <fieldset>
            <legend data-translate="contacto-contacto">Contact</legend>

            <p data-translate="contacto-metodo">Preferred method of contact?</p>

            <div class="contact-method">
                <label for="tel-contact" data-translate="contacto-label-tel">Phone Number</label>
                <input type="radio" name="contact" value="tel" id="tel-contact">

                <label for="email-contact" data-translate="contacto-label-email">Email</label>
                <input type="radio" name="contact" value="email" id="email-contact">
            </div>
            
            <p data-translate="contacto-aviso">If you choose phone, please select a date and time</p>
            
            <label for="date" data-translate="contacto-label-fecha">Date:</label>
            <input type="date" id="date">

            <label for="time" data-translate="contacto-label-hora">Time:</label>
            <input type="time" id="time" min="09:00" max="18:00">

        </fieldset>

        <!-- El botón submit necesita traducción en su VALUE -->
        <input type="submit" value="Send" class="green-button" data-translate="contacto-boton">
    </form>

</main>

<?php 
includeTemplates('footer');
?>