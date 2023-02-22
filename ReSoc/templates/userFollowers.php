<?php $title = "ReSoC - Mes abonnés"; ?>
<?php $pageDescription = "la liste des personnes qui suivent les messages de"; ?>

<?php ob_start(); ?>

<main class='contacts'>
    <?php
    foreach ($users as $user) {
    ?>
        <article >
            <img src="img/user_pic.png" alt="blason"/>
            <h3><?= $user['alias']?></h3>
            <p><?= $user['id']?></p>
        </article>
    <?php 
    } 
    ?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>