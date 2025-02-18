<?php if (!isset($_SESSION['user_id'])): ?>
    <p>Veuillez vous connecter pour voir vos tâches.</p>
    <a href="login.php">Se connecter</a>
<?php else: ?>
    <h1>Mes Tâches</h1>
    
    <!-- Ajouter une nouvelle tâche -->
    <form action="tasks.php?action=add" method="POST">
        <input type="text" name="title" placeholder="Titre de la tâche" required>
        <textarea name="description" placeholder="Description de la tâche" required></textarea>
        <button type="submit">Ajouter</button>
    </form>

    <!-- Liste des tâches -->
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?php echo htmlspecialchars($task['title']); ?></strong><br>
                <?php echo htmlspecialchars($task['description']); ?><br>
                <em>Status: <?php echo htmlspecialchars($task['status']); ?></em><br>
                
                <?php if ($task['status'] == 'pending'): ?>
                    <a href="tasks.php?action=complete&task_id=<?php echo $task['id']; ?>">Terminer</a>
                <?php else: ?>
                    <span>Terminé</span>
                <?php endif; ?>

                <a href="tasks.php?action=delete&task_id=<?php echo $task['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
