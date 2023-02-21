<?php
require 'src/model.php';

// Check if email input is different from null
$conexionProcess = isset($_POST['email']);

// Check if email and password are valid

if ($conexionProcess) {

    //Using $_POST variable to take email, alias and password in input form                  
    $new_email = $_POST['email'];
    $new_alias = $_POST['alias'];
    $new_password = $_POST['password'];
    //crypte password
    $new_password= md5($new_password);
};

//call fonction createUser               
$statement=createUser($new_email, $new_alias, $new_password);
    
require 'templates/userSignUp.php';
