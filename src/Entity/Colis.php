<?php

namespace App\Entity;

use App\Repository\ColisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColisRepository::class)]
class Colis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $taille = null;

    /**
     * @var Collection<int, Entrepot>
     */
    #[ORM\OneToMany(targetEntity: Entrepot::class, mappedBy: 'lesColis')]
    private Collection $lEntrepot;

    /**
     * @var Collection<int, Ville>
     */
    #[ORM\OneToMany(targetEntity: Ville::class, mappedBy: 'lesColis')]
    private Collection $laVille;

    public function __construct()
    {
        $this->lEntrepot = new ArrayCollection();
        $this->laVille = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * @return Collection<int, Entrepot>
     */
    public function getLEntrepot(): Collection
    {
        return $this->lEntrepot;
    }

    public function addLEntrepot(Entrepot $lEntrepot): static
    {
        if (!$this->lEntrepot->contains($lEntrepot)) {
            $this->lEntrepot->add($lEntrepot);
            $lEntrepot->setLesColis($this);
        }

        return $this;
    }

    public function removeLEntrepot(Entrepot $lEntrepot): static
    {
        if ($this->lEntrepot->removeElement($lEntrepot)) {
            // set the owning side to null (unless already changed)
            if ($lEntrepot->getLesColis() === $this) {
                $lEntrepot->setLesColis(null);
            }
        }

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
            $laVille->setLesColis($this);
        }

        return $this;
    }

    public function removeLaVille(Ville $laVille): static
    {
        if ($this->laVille->removeElement($laVille)) {
            // set the owning side to null (unless already changed)
            if ($laVille->getLesColis() === $this) {
                $laVille->setLesColis(null);
            }
        }

        return $this;
    }
}
