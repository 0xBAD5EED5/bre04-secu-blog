<?php

class Comment
{
    private ?int $id = null;

    public function __construct(
        private string $content,
        private User $user_id,
        private Post $post_id
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
        $this->content = content;
    }

    // User_id
    public function getUser_id(): User
    {
        return $this->user_id;
    }
    public function setUser_id(User $user_id): void
    {
        $this->user_id = $user_id;
    }

    // Post_id
    public function getPost_id(): Post
    {
        return $this->post_id;
    }
    public function setPost_id(Post $post_id): void
    {
        $this->post_id = $post_id;
    }
}
