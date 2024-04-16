<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $commentContent = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?Forumpost $postId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentContent(): ?string
    {
        return $this->commentContent;
    }

    public function setCommentContent(string $commentContent): static
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    public function getPostId(): ?Forumpost
    {
        return $this->postId;
    }

    public function setPostId(?Forumpost $postId): static
    {
        $this->postId = $postId;

        return $this;
    }
}