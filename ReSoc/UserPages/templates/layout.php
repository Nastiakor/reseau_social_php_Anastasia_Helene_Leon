<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="A REMPLIR">
        <meta name="description" content="Exercice created by Julien Falconnet">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    
    <body>
        <header>
            <img src="img/resoc.jpg" alt="Logo de notre réseau social"/>
            <nav id="menu">
                <a href="news.php">Actualités</a>
                <a href="wall.php?user_id=<?= $user['id']?>">Mur</a>
                <a href="feed.php?user_id=<?= $user['id']?>">Flux</a>
                <a href="tags.php?tag_id=">Mots-clés</a>
            </nav>
            <nav id="user">
                <a href="#">Profil</a>
                <ul>
                    <li><a href="settings.php?user_id=<?= $user['id']?>">Paramètres</a></li>
                    <li><a href="followers.php?user_id=<?= $user['id']?>">Mes suiveurs</a></li>
                    <li><a href="subscriptions.php?user_id=5<?= $user['id']?>">Mes abonnements</a></li>
                </ul>
            </nav>
        </header>

        <div id="wrapper" class='profile'>
            <aside>
                <img src="img/user.jpg" alt="Portrait de l'utilisatrice"/>
                <section>
                    <h3>Présentation</h3>
                    <p>Sur cette page vous trouverez <?= $pageDescription ?> l'utilisatrice <?= $user['alias']?> n° <?= $user['id'] ?></p>
                </section>
            </aside>
            
            <?= $content ?>
           
        </div>
    </body>
</html> 