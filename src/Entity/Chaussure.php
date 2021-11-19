<?php

namespace App\Entity;

class Chaussure
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $prix;

    /**
     * @var Size[]
     */
    private $tailles;

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Taille[]
     */
    public function getTailles(): array
    {
        return $this->tailles;
    }

    /**
     * @return Taille[]
     */
    public function setTailles(array $tailles): self
    {
        $this->tailles = $tailles;

        return $this;
    }

    /**
     * @param Taille $taille
     */
    public function addTaille(Taille $taille)
    {
        $this->tailles[] = $taille;
    }

    /**
     * @param Taille $taille
     */
    public function removeTaille(Taille $taille)
    {
        foreach ($this->tailles as $key => $entry) {
            if ($entry->getTaille() === $taille->getSize()) {
                unset($this->tailles[$key]);
            }
        }
    }
}
