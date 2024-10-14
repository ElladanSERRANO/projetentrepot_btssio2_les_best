<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'laVille')]
    private ?Entrepot $lesEntrepots = null;

    #[ORM\ManyToOne(inversedBy: 'laVille')]
    private ?Colis $lesColis = null;

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

    public function getLesEntrepots(): ?Entrepot
    {
        return $this->lesEntrepots;
    }

    public function setLesEntrepots(?Entrepot $lesEntrepots): static
    {
        $this->lesEntrepots = $lesEntrepots;

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
}
