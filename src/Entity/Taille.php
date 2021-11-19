<?php

namespace App\Entity;

class Taille
{
    /**
     * @var float
     */
    private $taille;

    public function __construct($taille)
    {
        $this->taille = $taille;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function setTaille(?float $size)
    {
        $this->size = $size;
    }
}
