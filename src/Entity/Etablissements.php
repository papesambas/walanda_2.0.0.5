<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\EtablissementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtablissementsRepository::class)]
class Etablissements
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\Column(length: 150)]
    private ?string $formeJuridique = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 60)]
    private ?string $numDecisionCreation = null;

    #[ORM\Column(length: 60)]
    private ?string $numDecisionOuverture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOuverture = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $numSocial = null;

    #[ORM\Column(length: 60)]
    private ?string $numFiscal = null;

    #[ORM\Column(length: 25)]
    private ?string $telephone = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $telephoneMobile = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $cpteBancaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'etablissement', targetEntity: Enseignements::class)]
    private Collection $enseignements;

    public function __construct()
    {
        $this->enseignements = new ArrayCollection();
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

    public function getFormeJuridique(): ?string
    {
        return $this->formeJuridique;
    }

    public function setFormeJuridique(string $formeJuridique): static
    {
        $this->formeJuridique = $formeJuridique;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumDecisionCreation(): ?string
    {
        return $this->numDecisionCreation;
    }

    public function setNumDecisionCreation(string $numDecisionCreation): static
    {
        $this->numDecisionCreation = $numDecisionCreation;

        return $this;
    }

    public function getNumDecisionOuverture(): ?string
    {
        return $this->numDecisionOuverture;
    }

    public function setNumDecisionOuverture(string $numDecisionOuverture): static
    {
        $this->numDecisionOuverture = $numDecisionOuverture;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(?\DateTimeInterface $dateOuverture): static
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getNumSocial(): ?string
    {
        return $this->numSocial;
    }

    public function setNumSocial(?string $numSocial): static
    {
        $this->numSocial = $numSocial;

        return $this;
    }

    public function getNumFiscal(): ?string
    {
        return $this->numFiscal;
    }

    public function setNumFiscal(string $numFiscal): static
    {
        $this->numFiscal = $numFiscal;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getTelephoneMobile(): ?string
    {
        return $this->telephoneMobile;
    }

    public function setTelephoneMobile(?string $telephoneMobile): static
    {
        $this->telephoneMobile = $telephoneMobile;

        return $this;
    }

    public function getCpteBancaire(): ?string
    {
        return $this->cpteBancaire;
    }

    public function setCpteBancaire(?string $cpteBancaire): static
    {
        $this->cpteBancaire = $cpteBancaire;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Enseignements>
     */
    public function getEnseignements(): Collection
    {
        return $this->enseignements;
    }

    public function addEnseignement(Enseignements $enseignement): static
    {
        if (!$this->enseignements->contains($enseignement)) {
            $this->enseignements->add($enseignement);
            $enseignement->setEtablissement($this);
        }

        return $this;
    }

    public function removeEnseignement(Enseignements $enseignement): static
    {
        if ($this->enseignements->removeElement($enseignement)) {
            // set the owning side to null (unless already changed)
            if ($enseignement->getEtablissement() === $this) {
                $enseignement->setEtablissement(null);
            }
        }

        return $this;
    }
}
