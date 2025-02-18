<?php
use app\Models\User;

require_once '../app/Models/User.php'; 

session_start();

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            if ($this->userModel->register($name, $email, $password)) {
                header("Location: index.php?action=login");
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $user = $this->userModel->login($email, $password);
            if ($user) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                header("Location: index.php?action=tasks");
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
?>
