<?php

require 'src/model.php';

$tags = getTags();

$tagId = intval($_GET['tag_id']);

$posts = getPostsbyTagId ($tagId);

require 'templates/tagNewsVu.php';

?>
 