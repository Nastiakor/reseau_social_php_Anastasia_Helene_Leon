<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="A REMPLIR">
        <meta name="description" content="Exercice created by Julien Falconnet">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="style.css?t=<?php echo time() ?>">
    </head>
    
    <body>

<!-- Hamburger menu  -->
    <header>
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox">
            <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        
        <ul class="menu__box">
            <li><a class="menu__item" href="tagNews.php">Actualités</a></li>   
            <li><a class="menu__item" href="wall.php?user_id=<?= $user['id']?>">Mur</a></li>
            <li><a class="menu__item" href="feed.php?user_id=<?= $user['id']?>">Flux</a></li>
            <li><a class="menu__item" href="userPost.php?user_id=<?= $user['id']?>">New Post</a></li>
        </ul>
        <a href='homepage.php'><img src="img/logo_ada.png" alt="Logo de notre réseau social"/></a>
    </div>
    
    <nav id="user">
    <a href="#">▾ Profil</a>
    <ul>
        <li><a href="settings.php?user_id=<?= $user['id']?>">Paramètres</a></li>
        <li><a href="followers.php?user_id=<?= $user['id']?>">Mes suiveurs</a></li>
        <li><a href="subscriptions.php?user_id=<?= $user['id']?>">Mes abonnements</a></li>
    </ul>
</nav>
</header>

<div id="wrapper" class='profile'>
   
    <?= $content ?>
</div>
</body>
</html> 