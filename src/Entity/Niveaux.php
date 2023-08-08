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

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Classes::class)]
    private Collection $classes;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Scolarites1::class)]
    private Collection $scolarites1s;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Scolarites2::class)]
    private Collection $scolarites2s;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Scolarites3::class)]
    private Collection $scolarites3s;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Redoublements1::class)]
    private Collection $redoublements1s;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Redoublements2::class)]
    private Collection $redoublements2s;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Redoublements3::class)]
    private Collection $redoublements3s;

    public function __construct()
    {
        $this->statuts = new ArrayCollection();
        $this->classes = new ArrayCollection();
        $this->scolarites1s = new ArrayCollection();
        $this->scolarites2s = new ArrayCollection();
        $this->scolarites3s = new ArrayCollection();
        $this->redoublements1s = new ArrayCollection();
        $this->redoublements2s = new ArrayCollection();
        $this->redoublements3s = new ArrayCollection();
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

    /**
     * @return Collection<int, Classes>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classes $class): static
    {
        if (!$this->classes->contains($class)) {
            $this->classes->add($class);
            $class->setNiveau($this);
        }

        return $this;
    }

    public function removeClass(Classes $class): static
    {
        if ($this->classes->removeElement($class)) {
            // set the owning side to null (unless already changed)
            if ($class->getNiveau() === $this) {
                $class->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Scolarites1>
     */
    public function getScolarites1s(): Collection
    {
        return $this->scolarites1s;
    }

    public function addScolarites1(Scolarites1 $scolarites1): static
    {
        if (!$this->scolarites1s->contains($scolarites1)) {
            $this->scolarites1s->add($scolarites1);
            $scolarites1->setNiveau($this);
        }

        return $this;
    }

    public function removeScolarites1(Scolarites1 $scolarites1): static
    {
        if ($this->scolarites1s->removeElement($scolarites1)) {
            // set the owning side to null (unless already changed)
            if ($scolarites1->getNiveau() === $this) {
                $scolarites1->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Scolarites2>
     */
    public function getScolarites2s(): Collection
    {
        return $this->scolarites2s;
    }

    public function addScolarites2(Scolarites2 $scolarites2): static
    {
        if (!$this->scolarites2s->contains($scolarites2)) {
            $this->scolarites2s->add($scolarites2);
            $scolarites2->setNiveau($this);
        }

        return $this;
    }

    public function removeScolarites2(Scolarites2 $scolarites2): static
    {
        if ($this->scolarites2s->removeElement($scolarites2)) {
            // set the owning side to null (unless already changed)
            if ($scolarites2->getNiveau() === $this) {
                $scolarites2->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Scolarites3>
     */
    public function getScolarites3s(): Collection
    {
        return $this->scolarites3s;
    }

    public function addScolarites3(Scolarites3 $scolarites3): static
    {
        if (!$this->scolarites3s->contains($scolarites3)) {
            $this->scolarites3s->add($scolarites3);
            $scolarites3->setNiveau($this);
        }

        return $this;
    }

    public function removeScolarites3(Scolarites3 $scolarites3): static
    {
        if ($this->scolarites3s->removeElement($scolarites3)) {
            // set the owning side to null (unless already changed)
            if ($scolarites3->getNiveau() === $this) {
                $scolarites3->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Redoublements1>
     */
    public function getRedoublements1s(): Collection
    {
        return $this->redoublements1s;
    }

    public function addRedoublements1(Redoublements1 $redoublements1): static
    {
        if (!$this->redoublements1s->contains($redoublements1)) {
            $this->redoublements1s->add($redoublements1);
            $redoublements1->setNiveau($this);
        }

        return $this;
    }

    public function removeRedoublements1(Redoublements1 $redoublements1): static
    {
        if ($this->redoublements1s->removeElement($redoublements1)) {
            // set the owning side to null (unless already changed)
            if ($redoublements1->getNiveau() === $this) {
                $redoublements1->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Redoublements2>
     */
    public function getRedoublements2s(): Collection
    {
        return $this->redoublements2s;
    }

    public function addRedoublements2(Redoublements2 $redoublements2): static
    {
        if (!$this->redoublements2s->contains($redoublements2)) {
            $this->redoublements2s->add($redoublements2);
            $redoublements2->setNiveau($this);
        }

        return $this;
    }

    public function removeRedoublements2(Redoublements2 $redoublements2): static
    {
        if ($this->redoublements2s->removeElement($redoublements2)) {
            // set the owning side to null (unless already changed)
            if ($redoublements2->getNiveau() === $this) {
                $redoublements2->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Redoublements3>
     */
    public function getRedoublements3s(): Collection
    {
        return $this->redoublements3s;
    }

    public function addRedoublements3(Redoublements3 $redoublements3): static
    {
        if (!$this->redoublements3s->contains($redoublements3)) {
            $this->redoublements3s->add($redoublements3);
            $redoublements3->setNiveau($this);
        }

        return $this;
    }

    public function removeRedoublements3(Redoublements3 $redoublements3): static
    {
        if ($this->redoublements3s->removeElement($redoublements3)) {
            // set the owning side to null (unless already changed)
            if ($redoublements3->getNiveau() === $this) {
                $redoublements3->setNiveau(null);
            }
        }

        return $this;
    }
}