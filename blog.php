<?php
    require 'includes/functions.php';
    includeTemplates('header');
?>

<main class="container section">
    <h1 data-translate="blog-titulo">Our Blog</h1>

    <!-- ARTÍCULO 1 (Terraza) -->
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
                
                <!-- OJO AQUÍ: Encapsulamos el texto estático -->
                <p>
                    <span data-translate="blog-meta-fecha">Written on</span> 
                    <span>June 22, 2025</span> 
                    <span data-translate="blog-meta-autor">by:</span> 
                    <span>Dante, Real Estate Agent</span>
                </p>

                <p data-translate="blog-entrada1-texto">Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
            </a>
        </div>
    </article>

    <!-- ARTÍCULO 2 (Decoración) -->
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
                <h4 data-translate="blog-entrada2-titulo">A guide to home decoration</h4>
                
                <p>
                    <span data-translate="blog-meta-fecha">Written on</span> 
                    <span>June 22, 2025</span> 
                    <span data-translate="blog-meta-autor">by:</span> 
                    <span>Dante, Real Estate Agent</span>
                </p>

                <!-- Noté que en tu código original repetiste el texto de la terraza aquí. 
                     He creado una clave nueva para que puedas poner texto distinto si quieres -->
                <p data-translate="blog-entrada2-texto">Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
            </a>
        </div>
    </article>

    <!-- ARTÍCULO 3 (Repetido - usa las mismas claves del 1) -->
    <article class="blog-entry">
        <div class="image">
            <picture>
                <source srcset="build/img/blog3.webp" type="image/webp">
                <source srcset="build/img/blog3.jpg" type="image/jpeg">
                <img src="build/img/blog3.jpg" alt="text entry blog" loading="lazy">
            </picture>
        </div>

        <div class="text-entry">
            <a href="entrada.php">
                <h4 data-translate="blog-entrada1-titulo">Designing the Perfect Rooftop Terrace</h4>
                <p>
                    <span data-translate="blog-meta-fecha">Written on</span> 
                    <span>June 22, 2025</span> 
                    <span data-translate="blog-meta-autor">by:</span> 
                    <span>Dante, Real Estate Agent</span>
                </p>
                <p data-translate="blog-entrada1-texto">Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
            </a>
        </div>
    </article>

    <!-- ARTÍCULO 4 (Repetido - usa las mismas claves del 2) -->
    <article class="blog-entry">
        <div class="image">
            <picture>
                <source srcset="build/img/blog4.webp" type="image/webp">
                <source srcset="build/img/blog4.jpg" type="image/jpeg">
                <img src="build/img/blog4.jpg" alt="text entry blog" loading="lazy">
            </picture>
        </div>

        <div class="text-entry">
            <a href="entrada.php">
                <h4 data-translate="blog-entrada2-titulo">A guide to home decoration</h4>
                <p>
                    <span data-translate="blog-meta-fecha">Written on</span> 
                    <span>June 22, 2025</span> 
                    <span data-translate="blog-meta-autor">by:</span> 
                    <span>Dante, Real Estate Agent</span>
                </p>
                <p data-translate="blog-entrada2-texto">Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
            </a>
        </div>
    </article>
</main>

<?php 
    includeTemplates('footer');
?>