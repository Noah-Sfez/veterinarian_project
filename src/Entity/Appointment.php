<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $appointmentDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $motif = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $assistant = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $veterinarian = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    /**
     * @var Collection<int, Traitement>
     */
    #[ORM\ManyToMany(targetEntity: Traitement::class)]
    private Collection $traitement;

    public function __construct()
    {
        $this->traitement = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): static
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getAppointmentDate(): ?\DateTimeInterface
    {
        return $this->appointmentDate;
    }

    public function setAppointmentDate(\DateTimeInterface $appointmentDate): static
    {
        $this->appointmentDate = $appointmentDate;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }

    public function getAssistant(): ?User
    {
        return $this->assistant;
    }

    public function setAssistant(?User $assistant): static
    {
        $this->assistant = $assistant;

        return $this;
    }

    public function getVeterinarian(): ?User
    {
        return $this->veterinarian;
    }

    public function setVeterinarian(?User $veterinarian): static
    {
        $this->veterinarian = $veterinarian;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Traitement>
     */
    public function getTraitement(): Collection
    {
        return $this->traitement;
    }

    public function addTraitement(Traitement $traitement): static
    {
        if (!$this->traitement->contains($traitement)) {
            $this->traitement->add($traitement);
        }

        return $this;
    }

    public function removeTraitement(Traitement $traitement): static
    {
        $this->traitement->removeElement($traitement);

        return $this;
    }
}
