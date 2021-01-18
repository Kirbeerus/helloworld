<?php

namespace App\Entity;

use App\Repository\CakeRepository;
use App\Entity\Ingredient;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CakeRepository::class)
 */
class Cake
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSweet;

    /**
     * @ORM\OneToMany(targetEntity=ingredient::class, mappedBy="cake", orphanRemoval=true)
     */
    private $ingredient;

    public function __construct()
    {
        $this->ingredient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsSweet(): ?bool
    {
        return $this->isSweet;
    }

    public function setIsSweet(bool $isSweet): self
    {
        $this->isSweet = $isSweet;

        return $this;
    }

    /**
     * @return Collection|ingredient[]
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(ingredient $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
            $ingredient->setCake($this);
        }

        return $this;
    }

    public function removeIngredient(ingredient $ingredient): self
    {
        if ($this->ingredient->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getCake() === $this) {
                $ingredient->setCake(null);
            }
        }

        return $this;
    }
}
