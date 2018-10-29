<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdresseRepository")
 */
class Adresse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $arrondissement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_voie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleVoie;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numero;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Oeuvre", inversedBy="adresse", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrondissement(): ?string
    {
        return $this->arrondissement;
    }

    public function setArrondissement(string $arrondissement): self
    {
        $this->arrondissement = $arrondissement;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->type_voie;
    }

    public function setTypeVoie(string $type_voie): self
    {
        $this->type_voie = $type_voie;

        return $this;
    }

    public function getLibelleVoie(): ?string
    {
        return $this->libelleVoie;
    }

    public function setLibelleVoie(string $libelleVoie): self
    {
        $this->libelleVoie = $libelleVoie;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getRelation(): ?Oeuvre
    {
        return $this->relation;
    }

    public function setRelation(Oeuvre $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
