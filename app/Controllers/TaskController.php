<?php
require_once '../app/Models/Task.php'; 

session_start();

use app\Models\Task;

class TaskController {
    private $taskModel;

    public function __construct($pdo) {
        $this->taskModel = new Task($pdo);
    }

    // Afficher toutes les tâches pour un utilisateur
    public function showTasks($userId) {
        $tasks = $this->taskModel->getAllTasks($userId);
        require_once '../app/Views/tasks.php';  // Vue pour afficher les tâches
    }

    // Ajouter une nouvelle tâche
    public function addTask($userId, $title, $description) {
        if ($this->taskModel->addTask($userId, $title, $description)) {
            header("Location: tasks.php");  // Rediriger vers la page des tâches
            exit();
        } else {
            echo "Erreur lors de l'ajout de la tâche.";
        }
    }

    // Marquer une tâche comme terminée
    public function completeTask($taskId) {
        if ($this->taskModel->completeTask($taskId)) {
            header("Location: tasks.php");  // Rediriger vers la page des tâches
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la tâche.";
        }
    }

    // Supprimer une tâche
    public function deleteTask($taskId) {
        if ($this->taskModel->deleteTask($taskId)) {
            header("Location: tasks.php");  // Rediriger vers la page des tâches
            exit();
        } else {
            echo "Erreur lors de la suppression de la tâche.";
        }
    }
}
?>
