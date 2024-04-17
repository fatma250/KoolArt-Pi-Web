<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'smallint')]
    private $rating;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\ManyToOne(targetEntity: Recette::class, inversedBy: 'reviews')]
    private ?Recette $recette = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating($rating): static
    {
        // Extract numeric value from the input string
        $numericRating = filter_var($rating, FILTER_SANITIZE_NUMBER_INT);

        // Validate that $numericRating is numeric
        if (!is_numeric($numericRating)) {
            throw new InvalidArgumentException('Rating must be a numeric value.');
        }

        // Convert $numericRating to an integer
        $rating = (int) $numericRating;

        // Validate that $rating is within a valid range
        if ($rating < 1 || $rating > 5) {
            throw new InvalidArgumentException('Rating must be between 1 and 5.');
        }

        $this->rating = $rating;

        return $this;
    }


    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): static
    {
        $this->recette = $recette;

        return $this;
    }
}
