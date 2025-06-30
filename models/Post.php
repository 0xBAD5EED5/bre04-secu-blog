<?php

class Post
{
    private ?int $id = null;

    public function __construct(
        private string $title,
        private string $excerpt,
        private string $content,
        private int $author,
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

    // Title
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // Excerpt
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }
    public function setExcerpt(string $excerpt): void
    {
        $this->excerpt = $excerpt;
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

    // Author (user_id)
    public function getAuthor(): int
    {
        return $this->author;
    }
    public function setAuthor(int $author): void
    {
        $this->author = $author;
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
