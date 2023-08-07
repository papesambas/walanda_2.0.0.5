<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\EnseignementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseignementsRepository::class)]
class Enseignements
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\ManyToOne(inversedBy: 'enseignements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etablissements $etablissement = null;

    #[ORM\OneToMany(mappedBy: 'enseignement', targetEntity: Cycles::class)]
    private Collection $cycles;

    public function __construct()
    {
        $this->cycles = new ArrayCollection();
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

    public function getEtablissement(): ?Etablissements
    {
        return $this->etablissement;
    }

    public function setEtablissement(?Etablissements $etablissement): static
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * @return Collection<int, Cycles>
     */
    public function getCycles(): Collection
    {
        return $this->cycles;
    }

    public function addCycle(Cycles $cycle): static
    {
        if (!$this->cycles->contains($cycle)) {
            $this->cycles->add($cycle);
            $cycle->setEnseignement($this);
        }

        return $this;
    }

    public function removeCycle(Cycles $cycle): static
    {
        if ($this->cycles->removeElement($cycle)) {
            // set the owning side to null (unless already changed)
            if ($cycle->getEnseignement() === $this) {
                $cycle->setEnseignement(null);
            }
        }

        return $this;
    }
}
