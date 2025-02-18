<?php
namespace app\Models;

class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer toutes les tâches pour un utilisateur
    public function getAllTasks($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    // Ajouter une nouvelle tâche
    public function addTask($userId, $title, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (user_id, title, description, status, created_at) VALUES (?, ?, ?, 'pending', NOW())");
        return $stmt->execute([$userId, $title, $description]);
    }

    // Marquer une tâche comme terminée
    public function completeTask($taskId) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET status = 'completed' WHERE id = ?");
        return $stmt->execute([$taskId]);
    }

    // Supprimer une tâche
    public function deleteTask($taskId) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$taskId]);
    }
}
?>
