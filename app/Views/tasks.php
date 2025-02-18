<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tâches</title>
</head>
<body>
    <h1>Liste des Tâches</h1>
    
    <form action="tasks.php?action=add" method="POST">
        <input type="text" name="title" placeholder="Titre de la tâche" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Ajouter la tâche</button>
    </form>

    <h2>Tâches en cours</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?= htmlspecialchars($task['title']) ?></strong> - <?= htmlspecialchars($task['description']) ?>
                (<?= $task['status'] ?>)
                <a href="tasks.php?action=update&task_id=<?= $task['id'] ?>&status=completed">Terminer</a>
                <a href="tasks.php?action=delete&task_id=<?= $task['id'] ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>
