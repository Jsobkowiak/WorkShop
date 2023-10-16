<?php

namespace App\Entity;

use App\Repository\AlerteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: AlerteRepository::class)]
#[ApiResource()]
class Alerte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'alertes')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'alertes')]
    private ?Poubelle $poubelle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getPoubelle(): ?Poubelle
    {
        return $this->poubelle;
    }

    public function setPoubelle(?Poubelle $poubelle): static
    {
        $this->poubelle = $poubelle;

        return $this;
    }
}
