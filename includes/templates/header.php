<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real State</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

    <header class="header <?php echo $home ? 'home' : ''; ?>">
        <div class="container header-content">
           <div class="bar">
            <a href="/"> <img src="/build/img/logo.svg" alt="Logo Real State"></a>
               
            <div class="mobile-menu">
                <img src="/build/img/barras.svg" alt="Menu Responsive"> 
             </div>

            
                <div class="right">

                
                    <div class="nav-controls">
                        <img src="/build/img/dark-mode.svg" alt="" class="dark-mode-button">

                        <button class="translate">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-language"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6.371c0 4.418 -2.239 6.629 -5 6.629" /><path d="M4 6.371h7" /><path d="M5 9c0 2.144 2.252 3.908 6 4" /><path d="M12 20l4 -9l4 9" /><path d="M19.1 18h-6.2" /><path d="M6.694 3l.793 .582" /></svg>
                        </button>
                    </div>
                
                 
                    <nav class="navbar">
                        <a href="aboutUs.php" data-translate="nav-nosotros">About Us</a>
                        <a href="announcements.php" data-translate="nav-anuncios">Announcements</a>
                        <a href="blog.php" data-translate="nav-blog">Blog</a>
                        <a href="contact.php" data-translate="nav-contacto">Contact</a>
                        
                        <?php if($auth): ?>
                        <a href="signOut.php" data-translate="nav-cerrar">Sign Out</a>
                    <?php endif;?>
                    </nav>
                    </div>   
                    </div>

            <?php 
                echo $home ? '<h1 data-translate="header-titulo">Exclusive Luxury Homes & Apartments for Sale</h1>' : ''; 
            ?>

</div>
</header>