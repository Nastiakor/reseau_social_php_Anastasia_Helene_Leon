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

function getUserPosts ($userId) {
    // Connect to database
    $mysqli = callDataBase();

    // Retrieve all user posts from posts table
    $sqlQuery = "
        SELECT posts.content, 
        posts.created, 
        users.alias as alias, 
        COUNT(likes.id) as likes, 
        GROUP_CONCAT(DISTINCT tags.label) AS taglist 
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

    return $posts = postsLoop($statement);

}

function getUserFeeds ($userId) {
    // Connect to database
    $mysqli = callDataBase();
    
    //Retrive all followers posts from posts table
    $sqlQuery = "
        SELECT posts.content,
        posts.created,
        users.alias as alias,  
        count(likes.id) as likes,  
        GROUP_CONCAT(DISTINCT tags.label) AS taglist 
        FROM followers 
        JOIN users ON users.id=followers.followed_user_id
        JOIN posts ON posts.user_id=users.id
        LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
        LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
        LEFT JOIN likes      ON likes.post_id  = posts.id 
        WHERE followers.following_user_id='$userId' 
        GROUP BY posts.id
        ORDER BY posts.created DESC  
        ";
    $statement = $mysqli->query($sqlQuery);
    if (!$statement)
    {
        echo("Échec de la requete : " . $mysqli->error);
    }

    return $posts = postsLoop($statement);

}

function getUserFollowing ($userId) {
    // Connect to database
    $mysqli = callDataBase();

    // Retrive user following from followers table
    $sqlQuery = "
    SELECT users.*
    FROM followers
    LEFT JOIN users ON users.id=followers.following_user_id
    WHERE followers.followed_user_id='$userId'
    GROUP BY users.id
    ";
    $statement = $mysqli->query($sqlQuery);
    if (!$statement) {
        echo("Échec de la requete : " . $mysqli->error);
        exit();
    }

    return $users = followersLoop($statement);
}

function getUserFollowed ($userId) {
    // Connect to database
    $mysqli = callDataBase();

    // Retrive user followed from followers table
    $sqlQuery = "
    SELECT users.*
    FROM followers
    LEFT JOIN users ON users.id=followers.followed_user_id
    WHERE followers.following_user_id='$userId'
    GROUP BY users.id
    ";
    $statement = $mysqli->query($sqlQuery);
    if (!$statement) {
        echo("Échec de la requete : " . $mysqli->error);
        exit();
    }

    return $users = followersLoop($statement);
}

function postsLoop ($statement) {
    $posts = [];
    while ($row = $statement->fetch_assoc()) {
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

function followersLoop($statement) {
    $users = [];
    while ($row = $statement->fetch_assoc()) {
        $user = [
            'alias' => $row['alias'],
            'id' => $row['id']
        ];

        $users[] = $user;
    }
    return $users;
}