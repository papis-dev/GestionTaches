<?php
require_once 'app/Controllers/UserController.php';
require_once 'app/Views/login.php';

function handleRequest($pdo) {
    $controller = new UserController($pdo);
    
    $url = $_GET['url'] ?? 'login'; // Par défaut, afficher la connexion

    switch ($url) {
        case 'register':
            $controller->register();
            break;
        case 'login':
            $controller->login();
            break;
        case 'logout':
            session_destroy();
            header("Location: index.php?url=login");
            exit();
        default:
            echo "Page introuvable";
    }
}
