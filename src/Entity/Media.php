<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Attribute\Groups;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use App\State\UserPasswordHasherProcessor;

#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
    operations: [
    new GetCollection(
        security: "is_granted('ROLE_DIRECTOR')",
        securityMessage: 'Accès refusé : vous n\'êtes pas autorisé à consulter la liste des médias.'
    ),
    new Post(
        security: "is_granted('ROLE_DIRECTOR')",
        processor: UserPasswordHasherProcessor::class,
        securityMessage: 'Accès refusé : vous n\'êtes pas autorisé à ajouter un média.'
    ),
    new Get(
        security: "is_granted('ROLE_DIRECTOR') or object.owner == user",
        securityMessage: 'Accès refusé : vous ne pouvez pas consulter ce média.'
    ),
    new Patch(
        processor: UserPasswordHasherProcessor::class,
        security: "is_granted('ROLE_DIRECTOR') or object.owner == user",
        securityMessage: 'Accès refusé : vous ne pouvez pas modifier ce média.'
    ),
    new Delete(
        security: "is_granted('ROLE_DIRECTOR') or object.owner == user",
        securityMessage: 'Accès refusé : vous ne pouvez pas supprimer ce média.'
    ),
],

)]

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(groups: 'read')]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(groups: ['read', 'write'])]
    private ?string $filePath = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): static
    {
        $this->filePath = $filePath;

        return $this;
    }
}
