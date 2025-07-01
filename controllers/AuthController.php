<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class AuthController extends AbstractController
{
    public function login() : void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $csrfManager = new CSRFTokenManager();
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = $csrfManager->generateCSRFToken();
        }
        $message = isset($_SESSION['register_message']) ? $_SESSION['register_message'] : null;
        unset($_SESSION['register_message']);
        $this->render("login", ["csrf_token" => $_SESSION['csrf_token'], "message" => $message]);
    }

    public function checkLogin() : void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $csrfManager = new CSRFTokenManager();
        if (!isset($_POST['csrf-token']) || !$csrfManager->validateCSRFToken($_POST['csrf-token'])) {
            $_SESSION['register_message'] = "Erreur de sécurité : le formulaire a expiré.";
            $this->redirect("index.php?route=login");
            exit;
        }

        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (empty($email) || empty($password)) {
            $_SESSION['register_message'] = "Merci de remplir tous les champs.";
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
            $_SESSION['register_message'] = "Identifiants incorrects.";
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
        $message = isset($_SESSION['register_message']) ? $_SESSION['register_message'] : null;
        unset($_SESSION['register_message']);
        $this->render("register", ["csrf_token" => $_SESSION['csrf_token'], "message" => $message]);
    }

    public function checkRegister() : void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        //
        $csrfManager = new CSRFTokenManager();
        if (!isset($_POST['csrf-token']) || !$csrfManager->validateCSRFToken($_POST['csrf-token'])) {
            $_SESSION['register_message'] = "Erreur de sécurité : le formulaire a expiré.";
            $this->redirect("index.php?route=register");
            exit;
        }

        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPassword = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';

        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            $_SESSION['register_message'] = "Merci de remplir tous les champs.";
            $this->redirect("index.php?route=register");
            exit;
        }

        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";
        if (!preg_match($regex, $password)) {
            $_SESSION['register_message'] = "Le mot de passe doit faire au moins 8 caractères, contenir une majuscule, une minuscule, un chiffre et un caractère spécial.";
            $this->redirect("index.php?route=register");
            exit;
        }

        if ($password !== $confirmPassword) {
            $_SESSION['register_message'] = "Les mots de passe ne correspondent pas.";
            $this->redirect("index.php?route=register");
            exit;
        }

        $userManager = new UserManager();
        if ($userManager->findByEmail($email)) {
            $_SESSION['register_message'] = "Cet email est déjà utilisé.";
            $this->redirect("index.php?route=register");
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($username, $email, $hashedPassword);
        $userManager->create($user);

        $_SESSION['register_message'] = "Inscription réussie, vous pouvez vous connecter.";
        $this->redirect("index.php?route=login");
        exit;
    }

    public function logout() : void
    {
        session_destroy();

        $this->redirect("index.php");
    }
}