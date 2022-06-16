<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $naam;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: pizza::class)]
    private $pizza;

    public function __construct()
    {
        $this->pizza = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

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

    /**
     * @return Collection<int, pizza>
     */
    public function getPizza(): Collection
    {
        return $this->pizza;
    }

    public function addPizza(pizza $pizza): self
    {
        if (!$this->pizza->contains($pizza)) {
            $this->pizza[] = $pizza;
            $pizza->setCategory($this);
        }

        return $this;
    }

    public function removePizza(pizza $pizza): self
    {
        if ($this->pizza->removeElement($pizza)) {
            // set the owning side to null (unless already changed)
            if ($pizza->getCategory() === $this) {
                $pizza->setCategory(null);
            }
        }

        return $this;
    }
}
