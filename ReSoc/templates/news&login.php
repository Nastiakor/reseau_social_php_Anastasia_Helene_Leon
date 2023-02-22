<?php $title = "ReSoC - news&login"; ?>

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




        <form action="login.php" method="post">
                        <input type='hidden'name='email'>
                        <dl>
                            <dt><label for='email'>E-Mail</label></dt>
                            <dd><input type='email'name='email'></dd>
                            <dt><label for='password'>Mot de passe</label></dt>
                            <dd><input type='password'name='password'></dd>
                        </dl>
                        <input type='submit'>
                    </form>
                    <p>
                        <?php    
                        if (!$user OR $user["password"] != $passwdAVerifier)
                        {
                            echo "IMPOSTEUR: MAIL OU PASSWORD INVALIDES";
                            
                        } else  
                        {      
                            $_SESSION['connected_id']=$user['id'];
                            header("Location: feed.php?user_id=".$user['id']);
                        }
                        ?>
                    </p>
                    <p>
                        Pas de compte?
                        <a href='registration.php'>Inscrivez-vous.</a>
                    </p>
    </article>
</main>


<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>