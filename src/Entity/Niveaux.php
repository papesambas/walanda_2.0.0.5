<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\NiveauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NiveauxRepository::class)]
class Niveaux
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\ManyToOne(inversedBy: 'niveauxes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cycles $cycle = null;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Statuts::class)]
    private Collection $statuts;

    public function __construct()
    {
        $this->statuts = new ArrayCollection();
    }

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

    public function getCycle(): ?Cycles
    {
        return $this->cycle;
    }

    public function setCycle(?Cycles $cycle): static
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * @return Collection<int, Statuts>
     */
    public function getStatuts(): Collection
    {
        return $this->statuts;
    }

    public function addStatut(Statuts $statut): static
    {
        if (!$this->statuts->contains($statut)) {
            $this->statuts->add($statut);
            $statut->setNiveau($this);
        }

        return $this;
    }

    public function removeStatut(Statuts $statut): static
    {
        if ($this->statuts->removeElement($statut)) {
            // set the owning side to null (unless already changed)
            if ($statut->getNiveau() === $this) {
                $statut->setNiveau(null);
            }
        }

        return $this;
    }
}