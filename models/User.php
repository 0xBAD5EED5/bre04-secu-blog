<?php

class User
{
    private ?int $id = null;

    public function __construct(
        private string $username,
        private string $email,
        private string $password,
        private string $role,
        private DateTime $created_at
    ) {}

    // ID
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    // Username
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    // Email
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // Password
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    // Role
    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    // Created_at
    public function getCreated_at(): DateTime
    {
        return $this->created_at;
    }
    public function setCreated_at(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
}
