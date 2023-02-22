<?php $title = "ReSoC - Flux"; ?>
<?php $pageDescription = "tous les messages des utilisatrices auxquels est abonnée"; ?>

<?php ob_start(); ?>
                           
<main>
    <?=require 'layoutPostsLoop.php'?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>