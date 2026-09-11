<main class="container section">
    <h1 data-translate="about-mas-nosotros">More about us</h1>

    <?php include 'icons.php' ?>

</main>

<section class="section container">
    <h2 data-translate="index-anuncios-titulo">Houses & Apartments for sale</h2>

    <?php 
        include 'list.php';
    ?>

    <div class="aline-right">
        <a href="/announcements" class="green-button" data-translate="index-ver-todas">View All Homes</a>
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
