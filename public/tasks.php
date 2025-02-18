<?php
// Charger la configuration de la base de données et les contrôleurs
require_once '../config/database.php';
require_once '../app/Controllers/TaskController.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Crée une instance du contrôleur des tâches
$controller = new TaskController($db);

// Gérer les actions en fonction de l'URL
$action = isset($_GET['action']) ? $_GET['action'] : 'show';

$userId = $_SESSION['user_id']; // Utilise l'ID de l'utilisateur connecté

switch ($action) {
    case 'add':
        // Ajouter une nouvelle tâche
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $controller->addTask($userId, $title, $description);
        }
        break;
        
    case 'complete':
        // Marquer une tâche comme terminée
        if (isset($_GET['task_id'])) {
            $taskId = $_GET['task_id'];
            $controller->completeTask($taskId);
        }
        break;
        
    case 'delete':
        // Supprimer une tâche
        if (isset($_GET['task_id'])) {
            $taskId = $_GET['task_id'];
            $controller->deleteTask($taskId);
        }
        break;
        
    default:
        // Afficher toutes les tâches de l'utilisateur
        $controller->showTasks($userId);
        break;
}

?>
