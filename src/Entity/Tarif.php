<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prix2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prix3;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoryTarif", inversedBy="tarifs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix1(): ?string
    {
        return $this->prix1;
    }

    public function setPrix1(string $prix1): self
    {
        $this->prix1 = $prix1;

        return $this;
    }

    public function getPrix2(): ?string
    {
        return $this->prix2;
    }

    public function setPrix2(?string $prix2): self
    {
        $this->prix2 = $prix2;

        return $this;
    }

    public function getPrix3(): ?string
    {
        return $this->prix3;
    }

    public function setPrix3(?string $prix3): self
    {
        $this->prix3 = $prix3;

        return $this;
    }

    public function getCategory(): ?CategoryTarif
    {
        return $this->category;
    }

    public function setCategory(?CategoryTarif $category): self
    {
        $this->category = $category;

        return $this;
    }
}
