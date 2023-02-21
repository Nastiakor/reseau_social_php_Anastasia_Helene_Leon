<?php $title = "ReSoC - News"; ?>

<?php ob_start(); ?>

<main class='contacts'>
    <?php
    foreach ($tags as $tag) {
    ?>
        <article >
            <a href="tagNews.php?user_id=<?=$tag['id']?>"><?="#".$tag['label']." "?></a>
        </article>
    <?php 
    } 
    ?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>