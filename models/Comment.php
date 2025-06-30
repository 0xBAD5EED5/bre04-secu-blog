<?php

class Comment
{
    private ?int $id = null;

    public function __construct(
        private string $content,
        private User $user,
        private Post $post
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

    // Content
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    // User
    public function getUser(): User
    {
        return $this->user;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    // Post
    public function getPost(): Post
    {
        return $this->post;
    }
    public function setPost(Post $post): void
    {
        $this->post = $post;
    }
}
