<?php

namespace app\Models;

class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllTasks($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function addTask($userId, $title, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (user_id, title, description) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $title, $description]);
    }

    public function updateTaskStatus($taskId, $status) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $taskId]);
    }

    public function deleteTask($taskId) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$taskId]);
    }
}
?>
