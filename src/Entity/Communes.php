<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\CommunesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommunesRepository::class)]
class Communes
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\ManyToOne(inversedBy: 'communes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cercles $cercle = null;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: LieuNaissances::class)]
    private Collection $lieuNaissances;

    public function __construct()
    {
        $this->lieuNaissances = new ArrayCollection();
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

    public function getCercle(): ?Cercles
    {
        return $this->cercle;
    }

    public function setCercle(?Cercles $cercle): static
    {
        $this->cercle = $cercle;

        return $this;
    }

    /**
     * @return Collection<int, LieuNaissances>
     */
    public function getLieuNaissances(): Collection
    {
        return $this->lieuNaissances;
    }

    public function addLieuNaissance(LieuNaissances $lieuNaissance): static
    {
        if (!$this->lieuNaissances->contains($lieuNaissance)) {
            $this->lieuNaissances->add($lieuNaissance);
            $lieuNaissance->setCommune($this);
        }

        return $this;
    }

    public function removeLieuNaissance(LieuNaissances $lieuNaissance): static
    {
        if ($this->lieuNaissances->removeElement($lieuNaissance)) {
            // set the owning side to null (unless already changed)
            if ($lieuNaissance->getCommune() === $this) {
                $lieuNaissance->setCommune(null);
            }
        }

        return $this;
    }
}
