<?php

    require 'includes/functions.php';

    includeTemplates('header', $home = true);
?>


    <main class="container section">
        <h1>More about us</h1>

        <div class="aboutUs-icons">
            <div class="icon">
                <img src="build/img/icono1.svg" alt="icon Secutiry" loading="lazy">
                <h3>Security</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati iusto itaque facilis neque recusandae sunt.</p>
            </div>
            <div class="icon">
                <img  src="build/img/icono2.svg" alt="icon Secutiry" loading="lazy">
                <h3>Price</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati iusto itaque facilis neque recusandae sunt.</p>
            </div>
            <div class="icon">
                <img src="build/img/icono3.svg" alt="icon Secutiry" loading="lazy">
                <h3>On time</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati iusto itaque facilis neque recusandae sunt.</p>
            </div>
        </div>
    </main>

    <section class="section container">
        <h2>Houses & Apartments for sale</h2>

        <?php 

            $limit_properties = 3;
            include 'includes/templates/announcements.php';
        ?>

        <div class="aline-right">
            <a href="announcements.php" class="green-button">View All Homes</a>
        </div>

    </section>

    <section class="image-contact">
        <h2>Find your Dream House</h2>
        <p>Complete the form and one of our advisors will get in touch with you shortly</p>
        <a href="contact.php" class="yellow-button">Contact Us</a>
    </section>

    <div class="container section bottom-section">
        <section class="blog">
            <h3>Our Blog</h3>

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
                        <p class="information-meta">Written on <span>June 22, 2025</span> by: <span>Dante, Real Estate Agent</span></p>
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
                        <p class="information-meta">Written on <span>June 22, 2025</span> by: <span>Dante, Real Estate Agent</span></p>
                        <p>Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimonials">
            <h3>Testimonials</h3>
            <div class="testimonial">
                <blockquote>
                    I had an amazing experience! The team was professional, attentive, and helped me find the perfect home. Highly recommended!
                </blockquote>
                <p>- Arturo Fonseca</p>
            </div>
        </section>

    </div>

<?php 
    includeTemplates('footer');
?>