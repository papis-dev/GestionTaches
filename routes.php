<?php
$url = $_GET['url'] ?? '';

switch ($url) {
    case 'tasks':
        require 'app/Views/tasks.php';
        break;
    default:
        require 'app/Views/login.php';
}
