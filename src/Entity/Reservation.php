<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ReservationRepository;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"ID_reservation", type:"integer", nullable:false)]
    private $idReservation;

    #[ORM\Column(name:"ID_user", type:"integer", nullable:false)]
    #[Assert\NotBlank]
    private $idUser;

    #[ORM\Column(name:"Date_reservation", type:"date", nullable:false)]
    #[Assert\NotBlank]
    private $dateReservation;

    #[ORM\Column(name:"Nombre_personnes", type:"integer", nullable:false)]
    #[Assert\NotBlank]
    private $nombrePersonnes;

    #[ORM\Column(name:"ID_restaurant", type:"integer", nullable:false)]
    #[Assert\NotBlank]
    private $idRestaurant;

    #[ORM\Column(name:"Heure_reservation", type:"string", length:11 , nullable:false)]
    #[Assert\NotBlank]
    private $heureReservation;

    #[ORM\ManyToOne(targetEntity: Table::class, inversedBy: "ID_table")]
    #[ORM\JoinColumn(name: "ID_table", referencedColumnName: "ID_table")]
    private $idTable;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
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

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): static
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getNombrePersonnes(): ?int
    {
        return $this->nombrePersonnes;
    }

    public function setNombrePersonnes(int $nombrePersonnes): static
    {
        $this->nombrePersonnes = $nombrePersonnes;

        return $this;
    }

    public function getIdRestaurant(): ?int
    {
        return $this->idRestaurant;
    }

    public function setIdRestaurant(int $idRestaurant): static
    {
        $this->idRestaurant = $idRestaurant;

        return $this;
    }

    public function getHeureReservation(): ?string
    {
        return $this->heureReservation;
    }

    public function setHeureReservation(string $heureReservation): static
    {
        $this->heureReservation = $heureReservation;

        return $this;
    }

    public function getIdTable(): ?Table
    {
        return $this->idTable;
    }

    public function setIdTable(?Table $idTable): static
    {
        $this->idTable = $idTable;

        return $this;
    }


}
