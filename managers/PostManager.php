<?php

class PostManager extends AbstractManager
{
    // Constructeur : initialise la connexion à la base via AbstractManager
    public function __construct()
    {
        parent::__construct();
    }

    // Récupère les 4 derniers posts (avec auteur et catégories)
    public function findLatest() : array
    {
        $um = new UserManager();
        $cm = new CategoryManager();

        $query = $this->db->prepare('SELECT * FROM posts ORDER BY created_at LIMIT 4');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $posts = [];

        foreach($result as $item)
        {
            $categories = $cm->findByPost($item["id"]);
            $user = $um->findOne($item["author"]);
            $post = new Post($item["title"], $item["excerpt"], $item["content"], $user, DateTime::createFromFormat('Y-m-d H:i:s', $item["created_at"]));
            $post->setId($item["id"]);
            $post->setCategories($categories);
            $posts[] = $post;
        }

        return $posts;
    }

    // Récupère un post par son identifiant (avec auteur et catégories)
    public function findOne(int $id) : ? Post
    {
        $um = new UserManager();
        $cm = new CategoryManager();

        $query = $this->db->prepare('SELECT * FROM posts WHERE id=:id');

        $parameters = [
            "id" => $id
        ];

        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $categories = $cm->findByPost($result["id"]);
            $user = $um->findOne($result["author"]);
            $post = new Post($result["title"], $result["excerpt"], $result["content"], $user, DateTime::createFromFormat('Y-m-d H:i:s', $result["created_at"]));
            $post->setId($result["id"]);
            $post->setCategories($categories);

            return $post;
        }

        return null;
    }

    // Récupère les posts d'une catégorie (avec auteur et catégories)
    public function findByCategory(int $categoryId) : array
    {
        $um = new UserManager();
        $cm = new CategoryManager();

        $query = $this->db->prepare('SELECT posts.* FROM posts JOIN posts_categories ON posts_categories.post_id=posts.id WHERE posts_categories.category_id=:category_id');
        $parameters = [
            "category_id" => $categoryId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $posts = [];

        foreach($result as $item)
        {
            $categories = $cm->findByPost($item["id"]);
            $user = $um->findOne($item["author"]);
            $post = new Post($item["title"], $item["excerpt"], $item["content"], $user, DateTime::createFromFormat('Y-m-d H:i:s', $item["created_at"]));
            $post->setId($item["id"]);
            $post->setCategories($categories);
            $posts[] = $post;
        }

        return $posts;
    }
}