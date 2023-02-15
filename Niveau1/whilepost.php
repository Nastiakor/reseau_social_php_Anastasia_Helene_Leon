<?php
while ($post = $lesInformations->fetch_assoc())
                    {
            
                ?>
                <article>
                    <h3>
                        <time datetime=<?php echo $post['created']?>>
                            <?php $date = new DateTime($post['created']); 
                            echo $date->format('d F Y à H:i');
                            ?> 
                        </time>
                    </h3>
                    
                    <address><?php echo $post['author_name'] ?></address>
                    
                    <div>
                        <p><?php echo $post['content'] ?></p>
                    </div>
                    
                    <footer>
                        <small>♥<?php echo $post['like_number'] ?> </small>
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
                