<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id", type:"integer", nullable:false)]
    private $id;

    #[ORM\Column(name:"id_user", type:"integer", nullable:false)]
    #[Assert\NotBlank]
    private $idUser;

    #[ORM\Column(name:"date", type:"datetime", nullable:false)]
    #[Assert\NotBlank]
    #[Assert\GreaterThanOrEqual("today", message:"The participation date must be greater than or equal to today.")]
    private $date;

    
    #[ORM\Column(name:"evenement_type", type:"string", length:255,  nullable:false)]
    #[Assert\NotBlank]
    private $evenementType;

    
    #[ORM\Column(name:"description", type:"text", length:65535,  nullable:true)]
    #[Assert\NotBlank]
    private $description;

    #[ORM\Column(name:"location", type:"string", length:255, nullable:true)]
    #[Assert\NotBlank]
    private $location;

    #[ORM\Column(name:"status", type:"string", length:50, nullable:true)]
    #[Assert\NotBlank]
    private $status;

    #[ORM\Column(name:"imageURL", type:"string", length:255, nullable:true)]
    private $imageurl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getEvenementType(): ?string
    {
        return $this->evenementType;
    }

    public function setEvenementType(string $evenementType): static
    {
        $this->evenementType = $evenementType;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getImageurl(): ?string
    {
        return $this->imageurl;
    }

    public function setImageurl(?string $imageurl): static
    {
        $this->imageurl = $imageurl;

        return $this;
    }


}
