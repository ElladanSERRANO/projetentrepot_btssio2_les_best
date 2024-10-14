<?php

namespace App\Entity;

use App\Repository\CasierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CasierRepository::class)]
class Casier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?int $taille = null;

    /**
     * @var Collection<int, Entrepot>
     */
    #[ORM\OneToMany(targetEntity: Entrepot::class, mappedBy: 'lesCasiers')]
    private Collection $lEntrepot;

    public function __construct()
    {
        $this->lEntrepot = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
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
            $lEntrepot->setLesCasiers($this);
        }

        return $this;
    }

    public function removeLEntrepot(Entrepot $lEntrepot): static
    {
        if ($this->lEntrepot->removeElement($lEntrepot)) {
            // set the owning side to null (unless already changed)
            if ($lEntrepot->getLesCasiers() === $this) {
                $lEntrepot->setLesCasiers(null);
            }
        }

        return $this;
    }
}
