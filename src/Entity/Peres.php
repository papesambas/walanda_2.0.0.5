<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\PeresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeresRepository::class)]
class Peres
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'peres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Noms $nom = null;

    #[ORM\ManyToOne(inversedBy: 'peres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prenoms $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'peres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Professions $profession = null;

    #[ORM\OneToOne(inversedBy: 'peres', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Telephones $telephone = null;

    #[ORM\OneToOne(inversedBy: 'peres', cascade: ['persist', 'remove'])]
    private ?Ninas $nina = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\OneToMany(mappedBy: 'epoux', targetEntity: Meres::class)]
    private Collection $epouses;

    public function __construct()
    {
        $this->epouses = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->fullname;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?Noms
    {
        return $this->nom;
    }

    public function setNom(?Noms $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?Prenoms
    {
        return $this->prenom;
    }

    public function setPrenom(?Prenoms $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfession(): ?Professions
    {
        return $this->profession;
    }

    public function setProfession(?Professions $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getTelephone(): ?Telephones
    {
        return $this->telephone;
    }

    public function setTelephone(Telephones $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNina(): ?Ninas
    {
        return $this->nina;
    }

    public function setNina(?Ninas $nina): static
    {
        $this->nina = $nina;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * @return Collection<int, Meres>
     */
    public function getEpouses(): Collection
    {
        return $this->epouses;
    }

    public function addEpouse(Meres $epouse): static
    {
        if (!$this->epouses->contains($epouse)) {
            $this->epouses->add($epouse);
            $epouse->setEpoux($this);
        }

        return $this;
    }

    public function removeEpouse(Meres $epouse): static
    {
        if ($this->epouses->removeElement($epouse)) {
            // set the owning side to null (unless already changed)
            if ($epouse->getEpoux() === $this) {
                $epouse->setEpoux(null);
            }
        }

        return $this;
    }
}