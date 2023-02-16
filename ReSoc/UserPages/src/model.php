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
    if (!$statement)
    {
        echo("Échec de la requete : " . $mysqli->error);
    }

    return $user = $statement->fetch_assoc();
}

function getPosts ($userId) {
    // Connect to database
    $mysqli = callDataBase();

    // Retrieve wall user posts
    $sqlQuery = "
        SELECT posts.content, posts.created, users.alias as alias, 
        COUNT(likes.id) as likes, GROUP_CONCAT(DISTINCT tags.label) AS taglist 
        FROM posts
        JOIN users ON  users.id=posts.user_id
        LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
        LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
        LEFT JOIN likes      ON likes.post_id  = posts.id 
        WHERE posts.user_id='$userId' 
        GROUP BY posts.id
        ORDER BY posts.created DESC  
        ";
    $statement = $mysqli->query($sqlQuery);
    if (!$statement)
    {
        echo("Échec de la requete : " . $mysqli->error);
    }

    $posts = [];
    while($row = $statement->fetch_assoc()) {
        $post = [
            'created' => $row['created'],
            'alias' => $row['alias'],
            'content' => $row['content'],
            'likes' => $row['likes'],
            'taglist' => $row['taglist'],
        ];

        $posts[] = $post;
    }

    return $posts;

}

function getUser ($userId) {
    // Connect to database
    $mysqli = callDataBase();

    // Retrive user information from users table
    $sqlQuery = "SELECT * FROM users WHERE id= '$userId' ";
    $statement = $mysqli->query($sqlQuery);
    if (!$statement)
    {
        echo("Échec de la requete : " . $mysqli->error);
    }

    return $user = $statement->fetch_assoc();
}