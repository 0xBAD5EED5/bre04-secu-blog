<?php
class CategoryManager extends AbstractManager
{
    // Récupérer toutes les catégories
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM categories');
        $categories = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = new Category($row['title'], $row['description']);
            $category->setId($row['id']);
            $categories[] = $category;
        }
        return $categories;
    }

    // Récupérer une catégorie par son id
    public function findOne(int $id): ?Category
    {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $category = new Category($row['title'], $row['description']);
            $category->setId($row['id']);
            return $category;
        }
        return null;
    }
}