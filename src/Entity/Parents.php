<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Repository\ParentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParentsRepository::class)]
class Parents
{
    use CreatedAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'parents', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Peres $pere = null;

    #[ORM\ManyToOne(inversedBy: 'parents', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Meres $mere = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Eleves::class)]
    private Collection $eleves;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPere(): ?Peres
    {
        return $this->pere;
    }

    public function setPere(?Peres $pere): static
    {
        $this->pere = $pere;

        return $this;
    }

    public function getMere(): ?Meres
    {
        return $this->mere;
    }

    public function setMere(?Meres $mere): static
    {
        $this->mere = $mere;

        return $this;
    }

    /**
     * @return Collection<int, Eleves>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleves $elefe): static
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves->add($elefe);
            $elefe->setParent($this);
        }

        return $this;
    }

    public function removeElefe(Eleves $elefe): static
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getParent() === $this) {
                $elefe->setParent(null);
            }
        }

        return $this;
    }
}
