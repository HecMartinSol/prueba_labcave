<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CharacterRepository")
 */
class Character
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\homeworld")
     * @ORM\JoinColumn(nullable=false)
     */
    private $homeworld;

    /**
     * @ORM\Column(type="integer")
     */
    private $birthYear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="float")
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hairColor;

    /**
     * @ORM\Column(type="float")
     */
    private $mass;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $skinColor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\species")
     * @ORM\JoinColumn(nullable=false)
     */
    private $species;

    /**
     * @ORM\Column(type="time")
     */
    private $created;

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

    public function getHomeworld(): ?homeworld
    {
        return $this->homeworld;
    }

    public function setHomeworld(?homeworld $homeworld): self
    {
        $this->homeworld = $homeworld;

        return $this;
    }

    public function getBirthYear(): ?int
    {
        return $this->birthYear;
    }

    public function setBirthYear(int $birthYear): self
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getHairColor(): ?string
    {
        return $this->hairColor;
    }

    public function setHairColor(string $hairColor): self
    {
        $this->hairColor = $hairColor;

        return $this;
    }

    public function getMass(): ?float
    {
        return $this->mass;
    }

    public function setMass(float $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getSkinColor(): ?string
    {
        return $this->skinColor;
    }

    public function setSkinColor(string $skinColor): self
    {
        $this->skinColor = $skinColor;

        return $this;
    }

    public function getSpecies(): ?species
    {
        return $this->species;
    }

    public function setSpecies(?species $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
