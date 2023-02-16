<?php

function callDataBase () {
    $mysqli = new mysqli("localhost", "root", "root", "socialnetwork");
    if ($mysqli->connect_errno)
    {
        echo("Échec de la connexion : " . $mysqli->connect_error);
        exit();
    }
    return $mysqli;
}

function getUserSettings ($userId) {
    // Connect to database
    $mysqli = callDataBase();

    // Retrieve user settings
    $sqlQuery = "
        SELECT users.*, 
        count(DISTINCT posts.id) as totalpost, 
        count(DISTINCT given.post_id) as totalgiven, 
        count(DISTINCT recieved.user_id) as totalrecieved 
        FROM users 
        LEFT JOIN posts ON posts.user_id=users.id 
        LEFT JOIN likes as given ON given.user_id=users.id 
        LEFT JOIN likes as recieved ON recieved.post_id=posts.id 
        WHERE users.id = '$userId' 
        GROUP BY users.id
        ";
    $statement = $mysqli->query($sqlQuery);
    if ( ! $statement)
    {
        echo("Échec de la requete : " . $mysqli->error);
    }

    return $user = $statement->fetch_assoc();
}