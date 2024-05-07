<?php

namespace App\Entity;

use App\Repository\RatingsystemRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatingsystemRepository::class)]
class Ratingsystem
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id", type:"integer", nullable:false)]
    private $id;
    
    #[ORM\Column(name:"userId", type:"integer", nullable:false)]
    #[Assert\NotBlank]
    private $userid;

    #[ORM\Column(name:"note", type:"integer", nullable:false)]
    #[Assert\NotBlank]
    private $note;

    #[ORM\ManyToOne(targetEntity:"Evenement")]
    #[ORM\JoinColumn(name:"eventId", referencedColumnName:"id")]
    private $eventid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getEventid(): ?Evenement
    {
        return $this->eventid;
    }

    public function setEventid(?Evenement $eventid): static
    {
        $this->eventid = $eventid;

        return $this;
    }


}
