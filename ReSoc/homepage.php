<?php
session_start();

require 'src/model.php';

$posts = getNews();

// Check if email input is different from null
$conexionProcess = isset($_POST['email']);

if ($conexionProcess) {
    //Using $_POST variable to take email, alias and password in input form  
    $emailAVerifier = $_POST['email'];
    $passwdAVerifier = $_POST['password'];

    // crypte password
    $passwdAVerifier = md5($passwdAVerifier);
};
    
$user = findUserByEmail($emailAVerifier, $passwdAVerifier); 


require 'templates/news&login.php';