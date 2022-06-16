<?php

namespace App\Entity;

use App\Repository\KlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KlantRepository::class)]
class Klant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $naam;

    #[ORM\Column(type: 'string', length: 11)]
    private $adres;

    #[ORM\Column(type: 'string', length: 11)]
    private $postcode;

    #[ORM\Column(type: 'string', length: 50)]
    private $woonplaats;

    #[ORM\OneToMany(mappedBy: 'klant', targetEntity: bestelling::class)]
    private $bestelling;

    public function __construct()
    {
        $this->bestelling = new ArrayCollection();
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

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    /**
     * @return Collection<int, bestelling>
     */
    public function getBestelling(): Collection
    {
        return $this->bestelling;
    }

    public function addBestelling(bestelling $bestelling): self
    {
        if (!$this->bestelling->contains($bestelling)) {
            $this->bestelling[] = $bestelling;
            $bestelling->setKlant($this);
        }

        return $this;
    }

    public function removeBestelling(bestelling $bestelling): self
    {
        if ($this->bestelling->removeElement($bestelling)) {
            // set the owning side to null (unless already changed)
            if ($bestelling->getKlant() === $this) {
                $bestelling->setKlant(null);
            }
        }

        return $this;
    }
}
