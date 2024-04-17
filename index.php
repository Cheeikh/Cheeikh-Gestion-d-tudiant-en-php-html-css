<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/helpers.php';
require_once 'config/bootstrap.php';
require_once 'config/fileLoad.php';


    $route = [
        '/' => "login",
        '/apprenant' => 'apprenant',
        '/presence' => 'presence',
        '/promotion' => 'promotion',
        '/referentiel' => 'referentiel',
        
    ];
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    var_dump($uri);
    
    require_once "models/".$uri.".model.php";

        require_once 'templates/partial/header.html.php';

        if(array_key_exists($uri, $route)){
            require_once "templates/".$route[$uri].".html.php" ;
        
        }

 require_once 'templates/partial/footer.html.php';       


