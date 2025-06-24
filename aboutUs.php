<?php

    require 'includes/functions.php';

    includeTemplates('header');
?>


    <main class="container section">
        <h1>Discover More About Us</h1>

        <div class="content-aboutUs">
            <div class="image">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="About us image" loading="lazy">                
                </picture>
            </div>
            <div class="text-aboutUs">
                <blockquote>25 Years of Experience</blockquote>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum deserunt quaerat unde ratione eos a voluptates eaque beatae magnam ut placeat sit minima repudiandae, sequi, molestiae obcaecati! Earum labore pariatur magni porro in. Soluta id officiis illo minus eius obcaecati deserunt temporibus molestias, cumque quod delectus alias, quidem autem voluptatibus voluptatum commodi, explicabo non quia quam exercitationem sapiente unde totam?</p>
               
            </div>
        </div>
    </main>

    <section class="container section">
        <h1>More about us</h1>

        <div class="aboutUs-icons">
            <div class="icon">
                <img src="build/img/icono1.svg" alt="icon Secutiry" loading="lazy">
                <h3>Security</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati iusto itaque facilis neque recusandae sunt.</p>
            </div>
            <div class="icon">
                <img src="build/img/icono2.svg" alt="icon Secutiry" loading="lazy">
                <h3>Price</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati iusto itaque facilis neque recusandae sunt.</p>
            </div>
            <div class="icon">
                <img src="build/img/icono3.svg" alt="icon Secutiry" loading="lazy">
                <h3>On time</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati iusto itaque facilis neque recusandae sunt.</p>
            </div>
        </div>
    </section>

    <?php 
    includeTemplates('footer');
?>