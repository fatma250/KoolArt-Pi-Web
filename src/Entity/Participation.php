<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"participation_id", type:"integer", nullable:false)]
    private $participationId;

    #[ORM\Column(name:"user_id", type:"integer", nullable:false)]
    #[Assert\NotBlank]
    private $userId;

    #[ORM\ManyToOne(targetEntity:"Evenement")]
    #[ORM\JoinColumn(name:"event_id", referencedColumnName:"id")]
    private $eventId;

    #[ORM\Column(name:"participation_date", type:"datetime", nullable:false)]
    #[Assert\NotBlank]
    #[Assert\GreaterThanOrEqual("today", message:"The participation date must be greater than or equal to today.")]
    private $participationDate;

    #[ORM\Column(name:"participation_status", type:"string", length:50, nullable:false)]
    #[Assert\NotBlank]
    private $participationStatus;

    #[ORM\Column(name:"numero", type:"string", length:50, nullable:false)]
    #[Assert\NotBlank]    
    #[Assert\Length(min:8,max:8,exactMessage:"The 'numero' must be exactly 8 characters long.")]
    private $numero;

    public function getParticipationId(): ?int
    {
        return $this->participationId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getEventId(): ?Evenement
    {
        return $this->eventId;
    }

    public function setEventId(Evenement $eventId): static
    {
        $this->eventId = $eventId;

        return $this;
    }

    public function getParticipationDate(): ?\DateTimeInterface
    {
        return $this->participationDate;
    }

    public function setParticipationDate(\DateTimeInterface $participationDate): static
    {
        $this->participationDate = $participationDate;

        return $this;
    }

    public function getParticipationStatus(): ?string
    {
        return $this->participationStatus;
    }

    public function setParticipationStatus(string $participationStatus): static
    {
        $this->participationStatus = $participationStatus;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }


}
