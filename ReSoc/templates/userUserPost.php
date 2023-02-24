<?php $title = "ReSoC - Post your message"; ?>

<?php ob_start(); ?>
                           
<main>
    <article>
        <h2>Poster un message</h2>
        <form action="userPost.php" method="post">
            <input type='hidden' name='alias'>
            <dl>
                <dt><label for='alias'>Auteur</label></dt>
                <dd><select name='alias'>
                        <?php
                        foreach ($authorList as $id => $alias)
                            echo "<option value='$id'>$alias</option>";
                        ?>
                    </select></dd>
                <dt><label for='message'>Message</label></dt>
                <dd><textarea name='message'></textarea></dd>
            </dl>
            <input type='submit'>
        </form>               
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>