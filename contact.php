<?php

    require 'includes/functions.php';

    includeTemplates('header');
?>

    <main class="container section">
        <h1>Contact</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Image Contact" loading="lazy">
        </picture>

        <h2>Fill out the contact form</h2>

        <form class="form">
            <fieldset>
                <legend>Personal Information</legend>

                <label for="name">Name</label>
                <input type="text" placeholder="Your Name" id="name">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Your E-mail" id="email">

                <label for="phoneNumber">Phone number</label>
                <input type="tel" placeholder="Your Phone Number" id="phoneNumber">
                
                <label for="message">Message</label>
                <textarea name="message" id="message" placeholder="Your message"></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Details</legend>

                <label for="options">Buy or Sell</label>
                <select name="" id="options">
                    <option value="" disabled selected>-- Select --</option>
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>

                <label for="estimate">Price or Estimate</label>
                <input type="number" id="estimate" placeholder="Your Price or Estimate">
            </fieldset>

            <fieldset>
                <legend>Contact</legend>

                <p>Preferred method of contact?</p>

                <div class="contact-method">
                    <label for="tel-contact">Phone Number</label>
                    <input type="radio" name="contact" value="tel" id="tel-contact">

                    <label for="email-contact">Email</label>
                    <input type="radio" name="contact" value="email" id="email-contact">
                </div>
                
                    <p>If you choose phone, please select a date and time</p>
                    <label for="date">Date:</label>
                    <input type="date" id="date">

                    <label for="time">Time:</label>
                    <input type="time" id="time" min="09:00" max="18:00">

                

            </fieldset>

            <input type="submit" value="Send" class="green-button">
        </form>

    </main>

    <?php 
    includeTemplates('footer');
?>