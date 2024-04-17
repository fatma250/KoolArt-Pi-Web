<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredients = null;

    #[ORM\Column(length: 255)]
    private ?string $instructions = null;

    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'recette')]
    private Collection $idreview;

    public function __construct()
    {
        $this->idreview = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): static
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(string $instructions): static
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getIdreview(): Collection
    {
        return $this->idreview;
    }

    public function addIdreview(Review $idreview): static
    {
        if (!$this->idreview->contains($idreview)) {
            $this->idreview->add($idreview);
            $idreview->setRecette($this);
        }

        return $this;
    }

    public function removeIdreview(Review $idreview): static
    {
        if ($this->idreview->removeElement($idreview)) {
            // set the owning side to null (unless already changed)
            if ($idreview->getRecette() === $this) {
                $idreview->setRecette(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name; // Assuming 'name' is the property you want to represent the Recette object as a string.
    }
}
