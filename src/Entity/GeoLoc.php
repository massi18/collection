<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeoLocRepository")
 */
class GeoLoc
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $x;

    /**
     * @ORM\Column(type="float")
     */
    private $y;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Oeuvre", inversedBy="geoLoc", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getX(): ?float
    {
        return $this->x;
    }

    public function setX(float $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?float
    {
        return $this->y;
    }

    public function setY(float $y): self
    {
        $this->y = $y;

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
