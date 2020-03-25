<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VirtualRepository")
 */
class Virtual
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
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoryVirtual", inversedBy="virtuals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TagVirtual", inversedBy="virtuals")
     */
    private $tag;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    public function __construct()
    {
        $this->tag = new ArrayCollection();
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

    public function getCategory(): ?CategoryVirtual
    {
        return $this->category;
    }

    public function setCategory(?CategoryVirtual $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|TagVirtual[]
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(TagVirtual $tag): self
    {
        if (!$this->tag->contains($tag)) {
            $this->tag[] = $tag;
        }

        return $this;
    }

    public function removeTag(TagVirtual $tag): self
    {
        if ($this->tag->contains($tag)) {
            $this->tag->removeElement($tag);
        }

        return $this;
    }

    public function getExcerpt($max = 50){
        $rawContent = strip_tags($this->content); 
        if (strlen($rawContent)>$max){
            $rawContent = substr($rawContent, 0, $max); 
            $pos = strrpos($rawContent, ' '); 
            if($pos !==false){
                $rawContent = substr($rawContent, 0, $pos);
            }
            $rawContent .=' ...'; 
        }
        return $rawContent;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
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
}
