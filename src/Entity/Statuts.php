<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\StatutsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutsRepository::class)]
class Statuts
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\ManyToOne(inversedBy: 'statuts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Niveaux $niveau = null;

    public function __toString()
    {
        return $this->designation;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    public function getNiveau(): ?Niveaux
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveaux $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }
}
