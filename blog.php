<?php

    require 'includes/functions.php';

    includeTemplates('header');
?>


    <main class="container section">
        <h1>Our Blog</h1>
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
                    <h4>Designing the Perfect Rooftop Terrace</h4>
                    <p>Written on <span>June 22, 2025</span> by: <span>Dante, Real Estate Agent</span></p>
                    <p>Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
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
                    <h4>A guide to home decoration </h4>
                    <p>Written on <span>June 22, 2025</span> by: <span>Dante, Real Estate Agent</span></p>
                    <p>Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
                </a>
            </div>
        </article>
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
                    <h4>Designing the Perfect Rooftop Terrace</h4>
                    <p>Written on <span>June 22, 2025</span> by: <span>Dante, Real Estate Agent</span></p>
                    <p>Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
                </a>
            </div>
        </article>

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
                    <h4>A guide to home decoration </h4>
                    <p>Written on <span>June 22, 2025</span> by: <span>Dante, Real Estate Agent</span></p>
                    <p>Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
                </a>
            </div>
        </article>
    </main>

    <?php 
    includeTemplates('footer');
?>