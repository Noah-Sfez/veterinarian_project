<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $species = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $pictures = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $owner = null;

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

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPictures(): ?Media
    {
        return $this->pictures;
    }

    public function setPictures(?Media $pictures): static
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function getOwner(): ?Client
    {
        return $this->owner;
    }

    public function setOwner(?Client $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}
