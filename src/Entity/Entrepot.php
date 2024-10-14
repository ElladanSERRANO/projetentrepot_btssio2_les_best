<?php

namespace App\Entity;

use App\Repository\EntrepotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepotRepository::class)]
class Entrepot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $entrepotNbCasier = null;

    #[ORM\Column]
    private ?int $distance = null;

    #[ORM\ManyToOne(inversedBy: 'lEntrepot')]
    private ?Casier $lesCasiers = null;

    #[ORM\ManyToOne(inversedBy: 'lEntrepot')]
    private ?Colis $lesColis = null;

    /**
     * @var Collection<int, Ville>
     */
    #[ORM\OneToMany(targetEntity: Ville::class, mappedBy: 'lesEntrepots')]
    private Collection $laVille;

    public function __construct()
    {
        $this->laVille = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEntrepotNbCasier(): ?int
    {
        return $this->entrepotNbCasier;
    }

    public function setEntrepotNbCasier(int $entrepotNbCasier): static
    {
        $this->entrepotNbCasier = $entrepotNbCasier;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): static
    {
        $this->distance = $distance;

        return $this;
    }

    public function getLesCasiers(): ?Casier
    {
        return $this->lesCasiers;
    }

    public function setLesCasiers(?Casier $lesCasiers): static
    {
        $this->lesCasiers = $lesCasiers;

        return $this;
    }

    public function getLesColis(): ?Colis
    {
        return $this->lesColis;
    }

    public function setLesColis(?Colis $lesColis): static
    {
        $this->lesColis = $lesColis;

        return $this;
    }

    /**
     * @return Collection<int, Ville>
     */
    public function getLaVille(): Collection
    {
        return $this->laVille;
    }

    public function addLaVille(Ville $laVille): static
    {
        if (!$this->laVille->contains($laVille)) {
            $this->laVille->add($laVille);
            $laVille->setLesEntrepots($this);
        }

        return $this;
    }

    public function removeLaVille(Ville $laVille): static
    {
        if ($this->laVille->removeElement($laVille)) {
            // set the owning side to null (unless already changed)
            if ($laVille->getLesEntrepots() === $this) {
                $laVille->setLesEntrepots(null);
            }
        }

        return $this;
    }
}
