<?php
    require 'includes/functions.php';
    includeTemplates('header');
?>

<main class="container section">
    <!-- Título Principal -->
    <h1 data-translate="about-titulo">Discover More About Us</h1>

    <div class="content-aboutUs">
        <div class="image">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img src="build/img/nosotros.jpg" alt="About us image" loading="lazy">                
            </picture>
        </div>
        <div class="text-aboutUs">
            <!-- Blockquote -->
            <blockquote data-translate="about-cita">25 Years of Experience</blockquote>
            
            <!-- Párrafo Principal -->
            <p data-translate="about-texto">We redefine real estate excellence, connecting extraordinary properties in Mexico and the United States with a select clientele. Our mission is to deliver impeccable, discreet, and personalized guidance, making the search for your ideal home a seamless, borderless experience. Beyond just properties, we curate exclusive lifestyles and secure investment opportunities, backed by deep international market insight and an unwavering passion for detail.</p>
           
        </div>
    </div>
</main>

<section class="container section">
    <!-- Título de Sección -->
    <h1 data-translate="about-mas-nosotros">More about us</h1>

    <div class="aboutUs-icons">
    <div class="icon">
        <img src="build/img/icono1.svg" alt="icon Security" loading="lazy">
        <h3 data-translate="icono-seguridad">Security</h3>
        <p data-translate="texto-seguridad">We shield your operation with total legal certainty. Our transparent processes protect your assets from any risk.</p>
    </div>

    <div class="icon">
        <img src="build/img/icono2.svg" alt="icon Price" loading="lazy">
        <h3 data-translate="icono-precio">Price</h3>
        <p data-translate="texto-precio">Forget about inflated prices. We offer the most competitive costs on the market to ensure maximum real value for your money.</p>
    </div>

    <div class="icon">
        <img src="build/img/icono3.svg" alt="icon On Time" loading="lazy">
        <h3 data-translate="icono-tiempo">On time</h3>
        <p data-translate="texto-tiempo">We know your time is gold. We guarantee immediate attention and agile management so you don't wait an unnecessary minute.</p>
    </div>
</div>
</section>

<?php 
    includeTemplates('footer');
?>