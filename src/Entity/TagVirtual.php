<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagVirtualRepository")
 */
class TagVirtual
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Virtual", mappedBy="tag")
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
            $virtual->addTag($this);
        }

        return $this;
    }

    public function removeVirtual(Virtual $virtual): self
    {
        if ($this->virtuals->contains($virtual)) {
            $this->virtuals->removeElement($virtual);
            $virtual->removeTag($this);
        }

        return $this;
    }
}
