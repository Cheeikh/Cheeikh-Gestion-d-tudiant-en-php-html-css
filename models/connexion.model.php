<?php
$users = loadFile('data/users.csv');
$login = "";
$password = "";
$validator = []; 

// Handle form submission
if (!empty($_POST)) {
    extract($_POST);

    // Data validation using dedicated function
    $validator = validerDonneesLogin($email, $password);

    // Process login attempt if validation passes
    if (empty($validator)) {
        $login = login($users, $login, $password);
        if (isset($login['userConnect'])) {
            $_SESSION['user'] = $login['userConnect'];
            header("Location: /promotion"); // Redirect to promotion page on successful login
            exit;
        }
    }
}

// Login validation function
function validerDonneesLogin($login, $password)
{
    $erreur = []; // Initialize error array

    if (empty($login)) {
        $erreur['emailError'] = "Veuillez renseigner votre email";
    } elseif (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $erreur['emailError'] = "Le format de l'email n'est pas valide";
    }

    if (empty($password)) {
        $erreur['passwordError'] = "Veuillez renseigner votre mot de passe";
    }

    return !empty($erreur) ? $erreur : []; // Return errors if any, otherwise empty array
}

// Login function
function login($users, $login, $password)
{
    $userConnect = false;

    foreach ($users as $user) {
        if ($user['email'] == $login && password_verify($password, $user['mot_de_passe'])) {
            if ($user["etat"] == "1") { // Check for active user status
                $userConnect = $user;
                break;
            } elseif ($user['etat'] == "0") {
                return "Compte suspendu, veuillez contacter l'administrateur.";
            }
        }
    }

    if ($userConnect === false) {
        return "Identifiant ou mot de passe incorrect.";
    }

    return ['userConnect' => $userConnect];
}