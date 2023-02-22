<?php $title = "ReSoC - News"; ?>

<?php ob_start(); ?>

<main>
    <?php
    foreach ($tags as $tag) {
    ?>
       <a class="hashtag" href="tagNews.php?tag_id=<?=$tag['id']?>"><?=" #".$tag['label']." "?></a>
    <?php 
    } 
    ?>

    <?php
    require 'layoutPostsLoop.php';
    ?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>