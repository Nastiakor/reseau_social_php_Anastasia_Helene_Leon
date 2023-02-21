<?php
session_start();
/**
 * BD
 */
$mysqli = new mysqli("localhost", "root", "root", "socialnetwork");
/**
 * Récupération de la liste des auteurs
 */
$listAuteurs = [];
$laQuestionEnSql = "SELECT * FROM users";
$lesInformations = $mysqli->query($laQuestionEnSql);
while ($user = $lesInformations->fetch_assoc())
{
    $listAuteurs[$user['id']] = $user['alias'];
}



$enCoursDeTraitement = isset($_POST['alias']);
if ($enCoursDeTraitement)
{
   
    
    
    $authorId = $_POST['alias'];
    $postContent = $_POST['message'];


    
    $authorId = intval($mysqli->real_escape_string($authorId));
    $postContent = $mysqli->real_escape_string($postContent);
  
    $lInstructionSql = "INSERT INTO posts "
            . "(id, user_id, content, created, parent_id) "
            . "VALUES (NULL, "
            . $authorId . ", "
            . "'" . $postContent . "', "
            . "NOW(), "
            . "NULL);"
            ;
   
    $ok = $mysqli->query($lInstructionSql);
    if ( ! $ok)
    {
        echo "Impossible d'ajouter le message: " . $mysqli->error;
    } else
    {
        echo "Message posté en tant que :" . $listAuteurs[$authorId];
    }
}

require 'templates/userUserPost.php';

