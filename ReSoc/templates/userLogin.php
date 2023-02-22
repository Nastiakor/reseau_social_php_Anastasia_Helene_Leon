<?php $title = "ReSoC - Login"; ?>

<?php ob_start(); ?>
                           
<main>
                <article>
                    <h2>Connexion</h2>
         
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
                        <a href='signUp.php'>Inscrivez-vous.</a>
                    </p>
    
                </article>
            </main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
