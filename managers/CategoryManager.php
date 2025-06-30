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

    // Ajouter une catégorie
    public function create(Category $category): bool
    {
        $sql = "INSERT INTO categories (title, description) VALUES (:title, :description)";
        $params = [
            ':title' => $category->getTitle(),
            ':description' => $category->getDescription()
        ];
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    // Modifier une catégorie
    public function update(Category $category): bool
    {
        $sql = "UPDATE categories SET title = :title, description = :description WHERE id = :id";
        $params = [
            ':title' => $category->getTitle(),
            ':description' => $category->getDescription(),
            ':id' => $category->getId()
        ];
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    // Supprimer une catégorie
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
}