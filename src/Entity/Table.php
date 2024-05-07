<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\TableRepository;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: "`table`")]
class Table
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_table", type: "integer")]
    private $idTable;

    #[ORM\Column(name:"Type_table", type:"string", length:12, nullable:false)]
    #[Assert\NotBlank]
    private $typeTable;

    #[ORM\Column(name:"Emplacement", type:"string", length:30, nullable:true)]
    #[Assert\NotBlank]
    private $emplacement;

    #[ORM\Column(name:"Etat_table", type:"string", length:20, nullable:true)]
    #[Assert\NotBlank]
    private $etatTable;

    #[ORM\Column(name:"Description", type:"string", length:12, nullable:false)]
    #[Assert\NotBlank]
    #[Assert\Length(min:3)]
    #[Assert\Regex("/^[A-Z]/","The description should start with a capital letter.")]
    private $description;

    #[ORM\Column(name:"ID_restaurant", type:"integer", nullable:true)]
    #[Assert\NotBlank]
    private $idRestaurant;

    #[ORM\Column(name:"isReserver", type:"boolean", nullable:true)]
    #[Assert\NotBlank]
    private $isreserver;

    public function getIdTable(): ?int
    {
        return $this->idTable;
    }

    public function getTypeTable(): ?string
    {
        return $this->typeTable;
    }

    public function setTypeTable(string $typeTable): static
    {
        $this->typeTable = $typeTable;

        return $this;
    }

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(?string $emplacement): static
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getEtatTable(): ?string
    {
        return $this->etatTable;
    }

    public function setEtatTable(?string $etatTable): static
    {
        $this->etatTable = $etatTable;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIdRestaurant(): ?int
    {
        return $this->idRestaurant;
    }

    public function setIdRestaurant(?int $idRestaurant): static
    {
        $this->idRestaurant = $idRestaurant;

        return $this;
    }

    public function isIsreserver(): ?bool
    {
        return $this->isreserver;
    }

    public function setIsreserver(?bool $isreserver): static
    {
        $this->isreserver = $isreserver;

        return $this;
    }


}
