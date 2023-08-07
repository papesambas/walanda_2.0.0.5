<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\MeresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeresRepository::class)]
class Meres
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'meres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Noms $nom = null;

    #[ORM\ManyToOne(inversedBy: 'meres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prenoms $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'meres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Professions $profession = null;

    #[ORM\OneToOne(inversedBy: 'meres', cascade: ['persist', 'remove'])]
    private ?Telephones $telephone = null;

    #[ORM\OneToOne(inversedBy: 'meres', cascade: ['persist', 'remove'])]
    private ?Ninas $nina = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\ManyToOne(inversedBy: 'epouses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Peres $epoux = null;

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

    public function setTelephone(?Telephones $telephone): static
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

    public function getEpoux(): ?Peres
    {
        return $this->epoux;
    }

    public function setEpoux(?Peres $epoux): static
    {
        $this->epoux = $epoux;

        return $this;
    }
}