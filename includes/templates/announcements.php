<?php 
    use App\Propertie;


    if($_SERVER['SCRIPT_NAME'] === '/announcements.php'){

        $properties = Propertie::all();

    } else {

        $properties = Propertie::get(3);

    }

?>

<div class="announcements-container">
    <?php foreach($properties as $propertie) { ?>
        
         <div class="announcement">
                            
            <img class="img-propertie" loading="lazy" src="/images/<?php echo $propertie->image; ?>" alt="announcement">

            <div class="announcement-content">
                
            <h3>
                    <?php echo $propertie->title; ?>
            </h3>

            <p>
                <?php echo $propertie->description; ?>
            </p>
                
            <div class="price-features-container">
                
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

                    <a href="announcement.php?id=<?php echo $propertie->id; ?>" 
                    class="yellow-button-block"
                    data-translate="anuncio-boton">
                    Explore Property
                    </a>
                </div>
            </div> 
        </div> <?php } ?>
</div>
