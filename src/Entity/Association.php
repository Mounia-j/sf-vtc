<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssociationRepository::class)
 */
class Association
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

   /**
    * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="associations")
    */
    private $vehicule;

    /**
     * @ORM\ManyToOne(targetEntity=Conducteur::class, inversedBy="associations")
     */
    
    private $conducteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getConducteur(): ?Conducteur
    {
        return $this->conducteur;
    }

    public function setConducteur(?Conducteur $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }
}
