<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class BlogController extends AbstractController
{
    public function home() : void
    {
        $postManager = new PostManager();
        $categoryManager = new CategoryManager();
        $posts = $postManager->findLatest();
        $categories = $categoryManager->findAll();
        $this->render("home", ["posts" => $posts, "categories" => $categories]);
    }

    public function category(string $categoryId) : void
    {
        $categoryManager = new CategoryManager();
        $postManager = new PostManager();
        $category = $categoryManager->findOne((int)$categoryId);
        if ($category) {
            $posts = $postManager->findByCategory((int)$categoryId);
            $this->render("category", ["category" => $category, "posts" => $posts]);
        } else {
            $this->redirect("index.php");
        }
    }

    public function post(string $postId) : void
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->findOne((int)$postId);
        if ($post) {
            $comments = $commentManager->findByPost((int)$postId);
            $this->render("post", ["post" => $post, "comments" => $comments]);
        } else {
            $this->redirect("index.php");
        }
    }

    public function checkComment() : void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $csrfManager = new CSRFTokenManager();
        if (!isset($_POST['csrf-token']) || !$csrfManager->validateCSRFToken($_POST['csrf-token'])) {
            $_SESSION['register_message'] = "Erreur de sécurité : le formulaire a expiré.";
            $this->redirect("index.php?route=post&post_id=" . (int)$_POST['post_id']);
            exit;
        }
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['register_message'] = "Vous devez être connecté pour commenter.";
            $this->redirect("index.php?route=login");
            exit;
        }
        $content = isset($_POST['content']) ? trim($_POST['content']) : '';
        $postId = isset($_POST['post_id']) ? (int)$_POST['post_id'] : 0;
        if (empty($content) || !$postId) {
            $_SESSION['register_message'] = "Merci de remplir le commentaire.";
            $this->redirect("index.php?route=post&post_id=" . $postId);
            exit;
        }
        // Protection XSS
        $content = htmlspecialchars($content);
        $userManager = new UserManager();
        $postManager = new PostManager();
        $user = $userManager->findOne($_SESSION['user_id']);
        $post = $postManager->findOne($postId);
        if ($user && $post) {
            $comment = new Comment($content, $user, $post);
            $commentManager = new CommentManager();
            $commentManager->create($comment);
            $_SESSION['register_message'] = "Commentaire ajouté !";
        }
        $this->redirect("index.php?route=post&post_id=" . $postId);
    }
}