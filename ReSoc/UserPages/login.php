<?php
session_start();

require 'src/model.php';

// Check if email input is different from null
$conexionProcess = isset($_POST['email']);

// Check if email and password are valid

if ($conexionProcess) {

    $emailAVerifier = $_POST['email'];
    $passwdAVerifier = $_POST['password'];

    // crypte password
    $passwdAVerifier = md5($passwdAVerifier);
    
    $user = findUserByEmail($emailAVerifier, $passwdAVerifier); 
    
    if (!$user OR $user["password"] != $passwdAVerifier)
    {
        echo "IMPOSTEUR: MAIL OU PASSWORD INVALIDES";
        
    } else  
    {      
        $_SESSION['connected_id']=$user['id'];
        header("Location: feed.php?user_id=".$user['id']);
    }
}

require 'templates/userLogin.php';