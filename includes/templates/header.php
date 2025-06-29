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
                 <img src="/build/img/dark-mode.svg" alt="" class="dark-mode-button">
                 
                 <nav class="navbar">
                     <a href="aboutUs.php">About Us</a>
                     <a href="announcements.php">Announcements</a>
                     <a href="blog.php">Blog</a>
                     <a href="contact.php">Contact</a>
                     <?php if($auth): ?>
                        <a href="signOut.php">Sign Out</a>
                    <?php endif;?>
                 </nav>
             </div>   
        </div>

        <?php echo $home ? '<h1>Exclusive Luxury Homes & Apartments for Sale</h1>' : ''; ?>

    </div>
</header>