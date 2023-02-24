<?php $title = "Ada Net - Welcome"; ?>

<?php ob_start(); ?>

<main>
    <div class='News'>
        <?php
        require 'layoutPostsLoop.php'; 
        ?>
    </div>

    <div class='UserConexion'>
        <form action="homepage.php" method="post">
            <input type='hidden'name='email'>
            <dl>
                <dt><label class='homepageText' for='email'>E-Mail</label></dt>
                <dd><input type='email'name='email'></dd>
                <dt><label class='homepageText' for='password'>Mot de passe</label></dt>
                <dd><input type='password'name='password'></dd>
            </dl>
            <input type='submit'>
        </form>
        <p>
            <?php    
        
            ?>
        </p>
        <p class='homepageText'>
            Pas de compte?
            <a class='homepageText' href='signUp.php'>Inscrivez-vous</a>
        </p>
    </div>
</main>


<?php $content = ob_get_clean(); ?>


<?php require 'layout.php'; ?>