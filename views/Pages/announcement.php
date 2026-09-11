 <main class="container section content-center">
        <h1><?php echo $propertie->title; ?></h1>

        <img loading="lazy" src="/images/<?php echo $propertie->image; ?>" alt="propertie image">
        

        <div class="property-overview">
            <p class="price">$<?php echo $propertie->price; ?></p>

                    <ul class="feature-icons">
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                            <p><?php echo $propertie->parking; ?></p>
                        </li> 
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                            <p><?php echo $propertie->bedrooms; ?></p>
                        </li>   
                        <li>
                            <img class="dark-icon" loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                            <p><?php echo $propertie->wc; ?></p>
                        </li>                          
                    </ul>
                    <p><?php echo $propertie->description; ?></p>
        </div>

    </main>