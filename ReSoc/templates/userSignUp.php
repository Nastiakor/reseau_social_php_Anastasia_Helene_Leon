<?php $title = "Ada Net - SignUp"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <h2>Inscription</h2>
        <form action="signUp.php" method="post">
            <input type='hidden' name='email' value=''>
            <dl>
                <dt><label for='alias'>Pseudo</label></dt>
                <dd><input type='text'name='alias'></dd>
                <dt><label for='email'>E-Mail</label></dt>
                <dd><input type='email'name='email'></dd>
                <dt><label for='password'>Mot de passe</label></dt>
                <dd><input type='password'name='password'></dd>
            </dl>
            <input type='submit'>
        </form>
        <p>
            <?php
            if ($statement)
            {
                echo "Votre inscription est un succès " . $new_alias ."! ";
                echo "<a href='login.php'> Connectez-vous!</a>";
            }
            ?>
        </p>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
