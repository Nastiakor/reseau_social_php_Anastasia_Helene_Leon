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
                $tagList = $post['taglist'];
                $tags = explode(",",$tagList);
                $index = 0;
                for ($index = 0; $index < count($tags); $index++) {
                ?>
                    <a href="tagNews.php?tag_id="><?=" #".$tags[$index]." "?></a>
                <?php
                }
                ?>
            </footer>
        </article>
    <?php
    }
    ?>