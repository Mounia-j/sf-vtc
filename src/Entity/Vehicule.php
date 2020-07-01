<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $immatriculation;

    /**
     * @ORM\OneToMany(targetEntity=Association::class, mappedBy="vehicule")
     */
    private $conducteur;

    public function __construct()
    {
        $this->conducteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * @return Collection|Association[]
     */
    public function getConducteur(): Collection
    {
        return $this->conducteur;
    }

    public function addConducteur(Association $conducteur): self
    {
        if (!$this->conducteur->contains($conducteur)) {
            $this->conducteur[] = $conducteur;
            $conducteur->setVehicule($this);
        }

        return $this;
    }

    public function removeConducteur(Association $conducteur): self
    {
        if ($this->conducteur->contains($conducteur)) {
            $this->conducteur->removeElement($conducteur);
            // set the owning side to null (unless already changed)
            if ($conducteur->getVehicule() === $this) {
                $conducteur->setVehicule(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->marque;
    }

}
