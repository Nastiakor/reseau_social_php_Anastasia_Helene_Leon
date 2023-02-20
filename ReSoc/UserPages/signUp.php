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

    //call fonction createUser               
    $statement=createUser($new_email, $new_alias, $new_password);
    
    
    if (!$statement)
    {
        echo "L'inscription a échouée : " . $mysqli->error;
    } else
    {
        echo "Votre inscription est un succès : " . $new_alias;
        echo " <a href='login.php'>Connectez-vous.</a>";
    }
}

require 'templates/userSignUp.php';
