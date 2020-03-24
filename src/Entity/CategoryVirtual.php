<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryVirtualRepository")
 */
class CategoryVirtual
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
     * @ORM\OneToMany(targetEntity="App\Entity\Virtual", mappedBy="category")
     */
    private $virtuals;

    public function __construct()
    {
        $this->virtuals = new ArrayCollection();
    }

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

    /**
     * @return Collection|Virtual[]
     */
    public function getVirtuals(): Collection
    {
        return $this->virtuals;
    }

    public function addVirtual(Virtual $virtual): self
    {
        if (!$this->virtuals->contains($virtual)) {
            $this->virtuals[] = $virtual;
            $virtual->setCategory($this);
        }

        return $this;
    }

    public function removeVirtual(Virtual $virtual): self
    {
        if ($this->virtuals->contains($virtual)) {
            $this->virtuals->removeElement($virtual);
            // set the owning side to null (unless already changed)
            if ($virtual->getCategory() === $this) {
                $virtual->setCategory(null);
            }
        }

        return $this;
    }
}
