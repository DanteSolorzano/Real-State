<?php
    require 'includes/functions.php';
    includeTemplates('header', $home = true);
?>

<main class="container section">
    <h1 data-translate="about-mas-nosotros">More about us</h1>

    <div class="aboutUs-icons">
        <div class="icon">
            <img src="build/img/icono1.svg" alt="icon Security" loading="lazy">
            <h3 data-translate="icono-seguridad">Security</h3>
            <p data-translate="texto-seguridad">We safeguard your transaction with absolute legal certainty. Our transparent processes shield your assets against any potential risk.</p>
        </div>
        <div class="icon">
            <img src="build/img/icono2.svg" alt="icon Price" loading="lazy">
            <h3 data-translate="icono-precio">Price</h3>
            <p data-translate="texto-precio">Forget about inflated prices. We offer the most competitive rates in the market to ensure you get the maximum real value for your investment.</p>
        </div>
        <div class="icon">
            <img src="build/img/icono3.svg" alt="icon On Time" loading="lazy">
            <h3 data-translate="icono-tiempo">On time</h3>
            <p data-translate="texto-tiempo">We know your time is precious. We guarantee immediate attention and agile management so you never wait a minute longer than necessary.</p>
        </div>
    </div>
</main>

<section class="section container">
    <h2 data-translate="index-anuncios-titulo">Houses & Apartments for sale</h2>

    <?php 
        $limit_properties = 3;
        include 'includes/templates/announcements.php';
    ?>

    <div class="aline-right">
        <a href="announcements.php" class="green-button" data-translate="index-ver-todas">View All Homes</a>
    </div>
</section>

<section class="image-contact">
    <h2 data-translate="index-contacto-titulo">Find your Dream House</h2>
    <p data-translate="index-contacto-texto">Complete the form and one of our advisors will get in touch with you shortly</p>
    <a href="contact.php" class="yellow-button" data-translate="index-contacto-boton">Contact Us</a>
</section>

<div class="container section bottom-section">
    <section class="blog">
        <h3 data-translate="blog-titulo">Our Blog</h3>

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="text entry blog" loading="lazy">
                </picture>
            </div>

            <div class="text-entry">
                <a href="entrada.php">
                    <h4 data-translate="blog-entrada1-titulo">Designing the Perfect Rooftop Terrace</h4>
                    
                    <p class="information-meta">
                        <span data-translate="blog-meta-fecha">Written on</span> 
                        <span>June 22, 2025</span> 
                        <span data-translate="blog-meta-autor">by:</span> 
                        <span>Dante, Real Estate Agent</span>
                    </p>
                    
                    <p data-translate="blog-entrada1-texto">Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
                </a>
            </div>
        </article>

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="text entry blog" loading="lazy">
                </picture>
            </div>

            <div class="text-entry">
                <a href="entrada.php">
                    <h4 data-translate="blog-entrada2-titulo">A guide to home decoration </h4>
                    
                    <p class="information-meta">
                        <span data-translate="blog-meta-fecha">Written on</span> 
                        <span>June 22, 2025</span> 
                        <span data-translate="blog-meta-autor">by:</span> 
                        <span>Dante, Real Estate Agent</span>
                    </p>
                    
                    <p data-translate="blog-entrada2-texto">Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimonials">
        <h3 data-translate="index-testimoniales-titulo">Testimonials</h3>
        <div class="testimonial">
            <blockquote data-translate="index-testimonial-cita">
                I had an amazing experience! The team was professional, attentive, and helped me find the perfect home. Highly recommended!
            </blockquote>
            <p>- Arturo Fonseca</p>
        </div>
    </section>
</div>

<?php 
    includeTemplates('footer');
?>