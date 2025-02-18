<?php
use app\Models\Task;

class TaskController {
    private $taskModel;

    public function __construct($pdo) {
        $this->taskModel = new Task($pdo);
    }

    public function showTasks($userId) {
        $tasks = $this->taskModel->getAllTasks($userId);
        require_once '../app/Views/tasks.php'; // Vue pour afficher les tâches
    }

    public function addTask($userId, $title, $description) {
        if ($this->taskModel->addTask($userId, $title, $description)) {
            header("Location: tasks.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de la tâche.";
        }
    }

    public function updateTaskStatus($taskId, $status) {
        if ($this->taskModel->updateTaskStatus($taskId, $status)) {
            header("Location: tasks.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la tâche.";
        }
    }

    public function deleteTask($taskId) {
        if ($this->taskModel->deleteTask($taskId)) {
            header("Location: tasks.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de la tâche.";
        }
    }
}
?>
