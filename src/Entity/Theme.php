<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
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
    private $nom_theme;

    /**
     * @ORM\ManyToMany(targetEntity=Ouvrage::class, inversedBy="themes")
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

    public function getNomTheme(): ?string
    {
        return $this->nom_theme;
    }

    public function setNomTheme(string $nom_theme): self
    {
        $this->nom_theme = $nom_theme;

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
        }

        return $this;
    }

    public function removeOuvrage(Ouvrage $ouvrage): self
    {
        $this->ouvrages->removeElement($ouvrage);

        return $this;
    }
}
