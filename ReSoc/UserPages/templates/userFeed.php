<?php $title = "ReSoC - Flux"; ?>
<?php $pageDescription = "tous les messages des utilisatrices auxquels est abonnée"; ?>

<?php ob_start(); ?>
                           
<main>
    <?php
    foreach ($posts as $post) {
    ?>
        <article>
            <h3>
                <time datetime=<?= $post['created']?> >
                    <?php $date = new DateTime($post['created']); 
                    echo $date->format('d F Y à H:i');
                    ?> 
                </time>
            </h3>
            
            <address><?= $post['alias'] ?></address>
            
            <div>
                <p><?= $post['content'] ?></p>
            </div>
            
            <footer>
                <small>♥<?= $post['likes'] ?></small>
                <?php 
                    $tag = $post['taglist'];
                    $arrayOfTags = explode(",",$tag);
                    $index = 0;
                    for ($index = 0; $index < count($arrayOfTags); $index++) {
                        echo '<a href="">' . "#" . $arrayOfTags[$index] . '</a>' . ' ';
                    }
                ?>
            </footer>
        </article>
    <?php
    }
    ?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>