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
        // Vérification des champs obligatoires
        if (!isset($_POST["email"]) || !isset($_POST["password"])) {
            $_SESSION["error-message"] = "Missing fields";
            $this->redirect("index.php?route=login");
            return;
        }

        // Vérification du token CSRF
        $tokenManager = new CSRFTokenManager();
        if (!isset($_POST["csrf-token"]) || !$tokenManager->validateCSRFToken($_POST["csrf-token"])) {
            $_SESSION["error-message"] = "Invalid CSRF token";
            $this->redirect("index.php?route=login");
            return;
        }

        // Recherche de l'utilisateur
        $um = new UserManager();
        $user = $um->findByEmail($_POST["email"]);
        if ($user === null || !password_verify($_POST["password"], $user->getPassword())) {
            $_SESSION["error-message"] = "Invalid login information";
            $this->redirect("index.php?route=login");
            return;
        }

        // Connexion réussie
        $_SESSION["user"] = $user->getId();
        unset($_SESSION["error-message"]);
        $this->redirect("index.php");
    }

    public function register() : void
    {
        $this->render("register", []);
    }

    public function checkRegister() : void
    {
        // Vérification des champs obligatoires
        if (!isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["confirm-password"])) {
            $_SESSION["error-message"] = "Missing fields";
            $this->redirect("index.php?route=register");
            return;
        }

        // Vérification du token CSRF
        $tokenManager = new CSRFTokenManager();
        if (!isset($_POST["csrf-token"]) || !$tokenManager->validateCSRFToken($_POST["csrf-token"])) {
            $_SESSION["error-message"] = "Invalid CSRF token";
            $this->redirect("index.php?route=register");
            return;
        }

        // Vérification de la correspondance des mots de passe
        if ($_POST["password"] !== $_POST["confirm-password"]) {
            $_SESSION["error-message"] = "The passwords do not match";
            $this->redirect("index.php?route=register");
            return;
        }

        // Vérification de la robustesse du mot de passe
        $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d\s])[A-Za-z\d^\w\s]{8,}$/';
        if (!preg_match($password_pattern, $_POST["password"])) {
            $_SESSION["error-message"] = "Password is not strong enough";
            $this->redirect("index.php?route=register");
            return;
        }

        // Vérification de l'existence de l'utilisateur
        $um = new UserManager();
        $user = $um->findByEmail($_POST["email"]);
        if ($user !== null) {
            $_SESSION["error-message"] = "User already exists";
            $this->redirect("index.php?route=register");
            return;
        }

        // Création de l'utilisateur
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $user = new User($username, $email, $password);
        $um->create($user);

        $_SESSION["user"] = $user->getId();
        unset($_SESSION["error-message"]);
        $this->redirect("index.php");
    }

    public function logout() : void
    {
        session_destroy();

        $this->redirect("index.php");
    }
}