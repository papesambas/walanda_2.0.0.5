<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\ProfessionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionsRepository::class)]
class Professions
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\OneToMany(mappedBy: 'profession', targetEntity: Peres::class)]
    private Collection $peres;

    #[ORM\OneToMany(mappedBy: 'profession', targetEntity: Meres::class)]
    private Collection $meres;

    public function __construct()
    {
        $this->peres = new ArrayCollection();
        $this->meres = new ArrayCollection();
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

    /**
     * @return Collection<int, Peres>
     */
    public function getPeres(): Collection
    {
        return $this->peres;
    }

    public function addPere(Peres $pere): static
    {
        if (!$this->peres->contains($pere)) {
            $this->peres->add($pere);
            $pere->setProfession($this);
        }

        return $this;
    }

    public function removePere(Peres $pere): static
    {
        if ($this->peres->removeElement($pere)) {
            // set the owning side to null (unless already changed)
            if ($pere->getProfession() === $this) {
                $pere->setProfession(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Meres>
     */
    public function getMeres(): Collection
    {
        return $this->meres;
    }

    public function addMere(Meres $mere): static
    {
        if (!$this->meres->contains($mere)) {
            $this->meres->add($mere);
            $mere->setProfession($this);
        }

        return $this;
    }

    public function removeMere(Meres $mere): static
    {
        if ($this->meres->removeElement($mere)) {
            // set the owning side to null (unless already changed)
            if ($mere->getProfession() === $this) {
                $mere->setProfession(null);
            }
        }

        return $this;
    }
}