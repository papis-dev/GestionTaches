<?php
require_once '../config/database.php';

require_once '../app/Controllers/UserController.php';

$controller = new UserController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

if ($action == 'register') {
    $controller->register();
} elseif ($action == 'login') {
    $controller->login();
} else {
    echo "Action inconnue.";
}

if ($action == 'register') {
    require_once '../app/Views/register.php';
} else {
    require_once '../app/Views/login.php';
}
?>
