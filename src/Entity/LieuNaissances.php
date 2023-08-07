<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\LieuNaissancesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuNaissancesRepository::class)]
class LieuNaissances
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\ManyToOne(inversedBy: 'lieuNaissances')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Communes $commune = null;

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

    public function getCommune(): ?Communes
    {
        return $this->commune;
    }

    public function setCommune(?Communes $commune): static
    {
        $this->commune = $commune;

        return $this;
    }
}
