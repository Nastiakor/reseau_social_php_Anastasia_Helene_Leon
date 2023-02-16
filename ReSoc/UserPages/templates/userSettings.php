<?php $title = "ReSoC - Paramètres"; ?>
<?php $pageDescription = "les informations de"; ?>

<?php ob_start(); ?>
                           
<article class='parameters'>
    <h3>Mes paramètres</h3>
    <dl>
        <dt>Pseudo</dt>
        <dd><?= $user['alias'] ?></dd>
        <dt>Email</dt>
        <dd><?= $user['email'] ?></dd>
        <dt>Nombre de messages</dt>
        <dd><?= $user['totalpost'] ?></dd>
        <dt>Nombre de "J'aime" donnés </dt>
        <dd><?= $user['totalgiven'] ?></dd>
        <dt>Nombre de "J'aime" reçus</dt>
        <dd><?= $user['totalrecieved'] ?></dd>
    </dl>
</article>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
