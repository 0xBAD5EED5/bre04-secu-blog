<?php
class CategoryManager extends AbstractManager
{
    // Récupérer toutes les catégories
    public function findAll(): array
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];
        foreach ($rows as $row) {
            $category = new Category($row['title'], $row['description']);
            $category->setId($row['id']);
            $categories[] = $category;
        }
        return $categories;
    }

    // Récupérer une catégorie par son id
    public function findOne(int $id): ?Category
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $category = new Category($row['title'], $row['description']);
            $category->setId($row['id']);
            return $category;
        }
        return null;
    }

    // Récupérer les catégories d'un post
    public function findByPost(int $postId): array
    {
        $sql = "SELECT c.* FROM categories c INNER JOIN posts_categories pc ON c.id = pc.category_id WHERE pc.post_id = :post_id";
        $params = [':post_id' => $postId];
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}