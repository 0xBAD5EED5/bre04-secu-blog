<?php

class UserManager extends AbstractManager
{
    // Trouver un utilisateur par id
    public function findOne(int $id): ?User
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $user = new User(
                $row['username'],
                $row['email'],
                $row['password'],
                $row['role'],
                new DateTime($row['created_at'])
            );
            $user->setId($row['id']);
            return $user;
        }
        return null;
    }
    // Trouver un utilisateur par email
    public function findByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email];
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $user = new User(
                $row['username'],
                $row['email'],
                $row['password'],
                $row['role'],
                new DateTime($row['created_at'])
            );
            $user->setId($row['id']);
            return $user;
        }
        return null;
    }

    // Créer un utilisateur
    public function create(User $user): bool
    {
        $sql = "INSERT INTO users (username, email, password, role, created_at) VALUES (:username, :email, :password, :role, :created_at)";
        $params = [
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':role' => $user->getRole(),
            ':created_at' => $user->getCreated_at()->format('Y-m-d H:i:s')
        ];
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
}