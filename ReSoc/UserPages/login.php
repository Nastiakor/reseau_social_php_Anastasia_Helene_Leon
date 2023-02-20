<?php
session_start();

require 'src/model.php';

// Check if email input is different from null
$conexionProcess = isset($_POST['email']);

// Check if email and password are valid

if ($conexionProcess) {

    $emailAVerifier = $_POST['email'];
    $passwdAVerifier = $_POST['password'];

    // $passwdAVerifier = $mysqli->real_escape_string($passwdAVerifier);
    // crypte password
    $passwdAVerifier = md5($passwdAVerifier);
    
    $user = findUserByEmail ($emailAVerifier); 
    
    if (!$user OR $user["password"] != $passwdAVerifier)
    {
        echo "IMPOSTEUR: MAIL OU PASSWORD INVALIDES";
        
    } else  
    {
        echo "Votre connexion est un succès : " . $user['alias'] . ".";
        
        $_SESSION['connected_id']=$user['id'];
        header("Location: feed.php");
    }
}

        
require 'templates/userLogin.php';