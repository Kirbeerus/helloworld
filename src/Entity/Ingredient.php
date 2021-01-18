<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isArgene;

    /**
     * @ORM\ManyToOne(targetEntity=Cake::class, inversedBy="ingredient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cake;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsArgene(): ?bool
    {
        return $this->isArgene;
    }

    public function setIsArgene(bool $isArgene): self
    {
        $this->isArgene = $isArgene;

        return $this;
    }

    public function getCake(): ?Cake
    {
        return $this->cake;
    }

    public function setCake(?Cake $cake): self
    {
        $this->cake = $cake;

        return $this;
    }
}
