<?php

class CommentManager extends AbstractManager
{
    // Constructeur : initialise la connexion à la base via AbstractManager
    public function __construct()
    {
        parent::__construct();
    }

    // Récupère les commentaires d'un post (avec utilisateur et post associés)
    public function findByPost(int $postId) : array
    {
        $um = new UserManager();
        $pm = new PostManager();

        $query = $this->db->prepare('SELECT * FROM comments WHERE post_id=:postId');
        $parameters = [
            "postId" => $postId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach($result as $item)
        {
            // On hydrate chaque commentaire avec l'utilisateur et le post
            $user = $um->findOne($item["user_id"]);
            $post = $pm->findOne($item["post_id"]);

            $comment = new Comment($item["content"], $user, $post);
            $comment->setId($item["id"]);

            $comments[] = $comment;
        }

        return $comments;
    }

    // Insère un nouveau commentaire en base
    public function create(Comment $comment) : void
    {
        $query = $this->db->prepare('INSERT INTO comments (id, content, user_id, post_id) VALUES (NULL, :content, :user_id, :post_id)');
        $parameters = [
            "content" => $comment->getContent(),
            "user_id" => $comment->getUser()->getId(),
            "post_id" => $comment->getPost()->getId(),
        ];

        $query->execute($parameters);

        // Hydrate l'id du commentaire après insertion
        $comment->setId($this->db->lastInsertId());
    }
}