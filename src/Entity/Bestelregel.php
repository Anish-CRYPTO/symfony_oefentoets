<?php

namespace App\Entity;

use App\Repository\BestelregelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BestelregelRepository::class)]
class Bestelregel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $aantal;

    #[ORM\ManyToOne(targetEntity: bestelling::class, inversedBy: 'bestelregels')]
    #[ORM\JoinColumn(nullable: false)]
    private $bestelling;

    #[ORM\ManyToOne(targetEntity: pizza::class, inversedBy: 'bestelregels')]
    #[ORM\JoinColumn(nullable: false)]
    private $pizza;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getBestelling(): ?bestelling
    {
        return $this->bestelling;
    }

    public function setBestelling(?bestelling $bestelling): self
    {
        $this->bestelling = $bestelling;

        return $this;
    }

    public function getPizza(): ?pizza
    {
        return $this->pizza;
    }

    public function setPizza(?pizza $pizza): self
    {
        $this->pizza = $pizza;

        return $this;
    }
}
