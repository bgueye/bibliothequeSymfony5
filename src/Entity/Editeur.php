<?php

namespace App\Entity;

use App\Repository\EditeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditeurRepository::class)
 */
class Editeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_editeur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adresse_editeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel_editeur;

    /**
     * @ORM\OneToMany(targetEntity=Ouvrage::class, mappedBy="editeur")
     */
    private $ouvrages;

    public function __construct()
    {
        $this->ouvrages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEditeur(): ?string
    {
        return $this->nom_editeur;
    }

    public function setNomEditeur(string $nom_editeur): self
    {
        $this->nom_editeur = $nom_editeur;

        return $this;
    }

    public function getAdresseEditeur(): ?string
    {
        return $this->adresse_editeur;
    }

    public function setAdresseEditeur(?string $adresse_editeur): self
    {
        $this->adresse_editeur = $adresse_editeur;

        return $this;
    }

    public function getTelEditeur(): ?string
    {
        return $this->tel_editeur;
    }

    public function setTelEditeur(?string $tel_editeur): self
    {
        $this->tel_editeur = $tel_editeur;

        return $this;
    }

    /**
     * @return Collection|Ouvrage[]
     */
    public function getOuvrages(): Collection
    {
        return $this->ouvrages;
    }

    public function addOuvrage(Ouvrage $ouvrage): self
    {
        if (!$this->ouvrages->contains($ouvrage)) {
            $this->ouvrages[] = $ouvrage;
            $ouvrage->setEditeur($this);
        }

        return $this;
    }

    public function removeOuvrage(Ouvrage $ouvrage): self
    {
        if ($this->ouvrages->removeElement($ouvrage)) {
            // set the owning side to null (unless already changed)
            if ($ouvrage->getEditeur() === $this) {
                $ouvrage->setEditeur(null);
            }
        }

        return $this;
    }
}
