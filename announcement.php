<?php

    require 'includes/functions.php';

    includeTemplates('header');
?>


    <main class="container section content-center">
        <h1>House for Sale on the Woods</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="Image of the property">
        </picture>

        <div class="property-overview">
            <p class="price">$3,000,000.00</p>

                    <ul class="feature-icons">
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                            <p>3</p>
                        </li> 
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                            <p>3</p>
                        </li> 
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                            <p>5</p>
                        </li>                            
                    </ul>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus recusandae explicabo cum tempore excepturi velit ea quibusdam corrupti modi qui!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda eum ducimus repellat maxime quisquam. Quidem accusantium optio maxime ipsum veniam? Architecto harum eaque eos doloribus quis. Quasi eius fugiat minus!</p>
        </div>

    </main>

    <?php 
    includeTemplates('footer');
?>