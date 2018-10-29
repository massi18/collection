<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OeuvreRepository")
 */
class Oeuvre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CollectionStreet", inversedBy="oeuvres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $collectionStreet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artist", inversedBy="relation")
     */
    private $artist;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Adresse", mappedBy="relation", cascade={"persist", "remove"})
     */
    private $adresse;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\GeoLoc", mappedBy="relation", cascade={"persist", "remove"})
     */
    private $geoLoc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCollectionStreet(): ?CollectionStreet
    {
        return $this->collectionStreet;
    }

    public function setCollectionStreet(?CollectionStreet $collectionStreet): self
    {
        $this->collectionStreet = $collectionStreet;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(Adresse $adresse): self
    {
        $this->adresse = $adresse;

        // set the owning side of the relation if necessary
        if ($this !== $adresse->getRelation()) {
            $adresse->setRelation($this);
        }

        return $this;
    }

    public function getGeoLoc(): ?GeoLoc
    {
        return $this->geoLoc;
    }

    public function setGeoLoc(GeoLoc $geoLoc): self
    {
        $this->geoLoc = $geoLoc;

        // set the owning side of the relation if necessary
        if ($this !== $geoLoc->getRelation()) {
            $geoLoc->setRelation($this);
        }

        return $this;
    }
}
