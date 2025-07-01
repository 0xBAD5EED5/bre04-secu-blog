<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class AuthController extends AbstractController
{
    public function login() : void
    {
        $this->render("login", []);
    }

    public function checkLogin() : void
    {
        session_start();
        $csrfManager = new CSRFTokenManager();
        if (!isset($_POST['csrf-token']) || !$csrfManager->validateCSRFToken($_POST['csrf-token'])) {
            $this->redirect("index.php?route=login");
            exit;
        }

        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // XSS: on n'affiche jamais directement les entrées utilisateur sans htmlspecialchars dans les vues

        if (empty($email) || empty($password)) {
            $this->redirect("index.php?route=login");
            exit;
        }

        $userManager = new UserManager();
        $user = $userManager->findByEmail($email);
        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['role'] = $user->getRole();
            $this->redirect("index.php");
            exit;
        } else {
            $this->redirect("index.php?route=login");
            exit;
        }
    }

    public function register() : void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $csrfManager = new CSRFTokenManager();
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = $csrfManager->generateCSRFToken();
        }
        $this->render("register", ["csrf_token" => $_SESSION['csrf_token']]);
    }

    public function checkRegister() : void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Debug temporaire : afficher le POST
        echo '<pre style="color:red">POST : ' . print_r($_POST, true) . '</pre>';
        flush();
        $csrfManager = new CSRFTokenManager();
        if (!isset($_POST['csrf-token']) || !$csrfManager->validateCSRFToken($_POST['csrf-token'])) {
            echo '<p style="color:red">CSRF token invalide</p>';
            exit;
        }

        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPassword = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';

        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            echo '<p style="color:red">Champs manquants</p>';
            exit;
        }

        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";
        if (!preg_match($regex, $password)) {
            echo '<p style="color:red">Mot de passe non conforme</p>';
            exit;
        }

        if ($password !== $confirmPassword) {
            echo '<p style="color:red">Les mots de passe ne correspondent pas</p>';
            exit;
        }

        $userManager = new UserManager();
        if ($userManager->findByEmail($email)) {
            echo '<p style="color:red">Email déjà utilisé</p>';
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($username, $email, $hashedPassword);
        $userManager->create($user);

        echo '<p style="color:green">Utilisateur créé avec succès !</p>';
        echo '<pre>' . print_r($user, true) . '</pre>';
        flush();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['role'] = $user->getRole();
        // $this->redirect("index.php");
        exit;
    }

    public function logout() : void
    {
        session_destroy();

        $this->redirect("index.php");
    }
}