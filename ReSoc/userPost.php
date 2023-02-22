<?php
require 'src/model.php';
session_start();

$authorList = getAlias();

$conexionProcess = isset($_POST['alias']);
if ($conexionProcess)
{     
    $authorId = $_POST['alias'];
    $postContent = $_POST['message'];

}

$statement = createPost($authorId, $postContent);


require 'templates/userUserPost.php';

