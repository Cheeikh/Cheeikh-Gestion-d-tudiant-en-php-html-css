<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion des fichiers nécessaires
require_once 'config/helpers.php';
require_once 'config/bootstrap.php';
require_once 'config/fileLoad.php';

// Définition des routes
$route = [
    '/' => 'connexion',
    '/apprenant' => 'apprenant',
    '/presence' => 'presence',
    '/promotion' => 'promotion',
    '/referentiel' => 'referentiel',
];

// Récupération de l'URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Affichage de la page de connexion seule si l'URI est "/"
if ($uri === '/') {
    require_once "templates/connexion.html.php";
    $modelPath = "models/connexion.model.php";
    require_once $modelPath;
    exit; // Sortie du script après l'inclusion de la page de connexion
}

// Inclusion du modèle correspondant uniquement si ce n'est pas la page de connexion
if ($uri !== '/') {
    $modelPath = "models/$uri.model.php";
    if (file_exists($modelPath)) {
        require_once $modelPath;
    }
}

// Redirection vers la page de connexion si la route n'existe pas
if (!array_key_exists($uri, $route)) {
    header('Location: /');
    exit;
}

// Inclusion de l'en-tête
require_once 'templates/partial/header.html.php';

// Inclusion de la vue correspondante si la route existe
if (array_key_exists($uri, $route)) {
    require_once "templates/{$route[$uri]}.html.php";
}

// Inclusion du pied de page
require_once 'templates/partial/footer.html.php';
?>