Initialisation projet sur git

git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/papis-dev/GestionTaches.git
git push -u origin main

Création d'une base de données sur phpmyadmin

database.php dans config pour la connexion à la base de données

Gestion des utilisateurs

-Requetes dans app/Models/User.php pour l'insertion des utilisateurs
-UserController: fonction register pour l'inscription et login pour la connexion
-register.php et login.php dans Views pour les formulaires

puis commit

Gestion des taches

-TaskController qui contient les différentes fonctions add, update, delete une tache en fonction de l'utilisateur
-une vue mes taches
-un task.php dans Models pour les requêtes d'insertion d'update et de suppression dans la base de données.
-on verra quand un utilisateur se connecte il peut ajouter une tache, voir ses taches et les supprimer
-un petit soucis c'est quand on se reconnecte on ne voit pas les taches précedemment ajoutées(qui sont toujours dans la base). Il faut ajouter une nouvelle tâche pour pouvoir tous les voir.

-commit final git commit -m "Terminer" puis push







