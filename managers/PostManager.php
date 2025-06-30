<?php
class PostManager extends AbstractManager
{
    // Retourne les 4 derniers posts
    public function findLatest(): array
    {
        $stmt = $this->db->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 4');
        $posts = [];
        $userManager = new UserManager();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $author = $userManager->findOne($row['author']);
            $post = new Post(
                $row['title'],
                $row['excerpt'],
                $row['content'],
                $author,
                new DateTime($row['created_at'])
            );
            $post->setId($row['id']);
            $posts[] = $post;
        }
        return $posts;
    }

    // Retourne un post par son id
    public function findOne(int $id): ?Post
    {
        $stmt = $this->db->prepare('SELECT * FROM posts WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $userManager = new UserManager();
            $author = $userManager->findOne($row['author']);
            $post = new Post(
                $row['title'],
                $row['excerpt'],
                $row['content'],
                $author,
                new DateTime($row['created_at'])
            );
            $post->setId($row['id']);
            return $post;
        }
        return null;
    }

    // Retourne les posts d'une catégorie
    public function findByCategory(int $categoryId): array
    {
        $stmt = $this->db->prepare('SELECT p.* FROM posts p INNER JOIN posts_categories pc ON p.id = pc.post_id WHERE pc.category_id = :categoryId');
        $stmt->execute(['categoryId' => $categoryId]);
        $posts = [];
        $userManager = new UserManager();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $author = $userManager->findOne($row['author']);
            $post = new Post(
                $row['title'],
                $row['excerpt'],
                $row['content'],
                $author,
                new DateTime($row['created_at'])
            );
            $post->setId($row['id']);
            $posts[] = $post;
        }
        return $posts;
    }
}