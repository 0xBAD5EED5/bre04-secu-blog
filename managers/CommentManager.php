<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CommentManager extends AbstractManager
{
    // Récupérer les commentaires d'un post
    public function findByPost(int $postId): array
    {
        $sql = "SELECT * FROM comments WHERE post_id = :post_id";
        $params = [':post_id' => $postId];
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];
        $userManager = new UserManager();
        $postManager = new PostManager();
        foreach ($rows as $row) {
            $user = $userManager->findOne($row['user_id']);
            $post = $postManager->findOne($row['post_id']);
            $comment = new Comment(
                $row['content'],
                $user,
                $post
            );
            $comment->setId($row['id']);
            $comments[] = $comment;
        }
        return $comments;
    }

    // Insérer un commentaire
    public function create(Comment $comment): bool
    {
        $sql = "INSERT INTO comments (content, user_id, post_id) VALUES (:content, :user_id, :post_id)";
        $params = [
            ':content' => $comment->getContent(),
            ':user_id' => $comment->getUser()->getId(),
            ':post_id' => $comment->getPost()->getId()
        ];
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
}