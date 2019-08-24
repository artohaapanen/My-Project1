<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RyhmatRepository")
 */
class Ryhmat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $tunnus;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nimi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTunnus(): ?int
    {
        return $this->tunnus;
    }

    public function setTunnus(int $tunnus): self
    {
        $this->tunnus = $tunnus;

        return $this;
    }

    public function getNimi(): ?string
    {
        return $this->nimi;
    }

    public function setNimi(string $nimi): self
    {
        $this->nimi = $nimi;

        return $this;
    }
}
