<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HousingRepository")
 */
class Housing
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
    private $lot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $electricity;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $various_maintenance;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $outdoor_maintenance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Building", inversedBy="housings")
     */
    private $building;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Lodger", mappedBy="housing", cascade={"persist"})
     */
    private $lodger;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLot(): ?string
    {
        return $this->lot;
    }

    public function setLot(string $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRent(): ?float
    {
        return $this->rent;
    }

    public function setRent(?float $rent): self
    {
        $this->rent = $rent;

        return $this;
    }

    public function getElectricity(): ?float
    {
        return $this->electricity;
    }

    public function setElectricity(?float $electricity): self
    {
        $this->electricity = $electricity;

        return $this;
    }

    public function getVariousMaintenance(): ?float
    {
        return $this->various_maintenance;
    }

    public function setVariousMaintenance(?float $various_maintenance): self
    {
        $this->various_maintenance = $various_maintenance;

        return $this;
    }

    public function getOutdoorMaintenance(): ?float
    {
        return $this->outdoor_maintenance;
    }

    public function setOutdoorMaintenance(?float $outdoor_maintenance): self
    {
        $this->outdoor_maintenance = $outdoor_maintenance;

        return $this;
    }

    public function __toString(): string
    {
        return 'Logement n° '.$this->lot . ' Type : '. $this->type;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): self
    {
        $this->building = $building;

        return $this;
    }

    public function getLodger(): ?Lodger
    {
        return $this->lodger;
    }

    public function setLodger(?Lodger $lodger): self
    {
        $this->lodger = $lodger;

        // set (or unset) the owning side of the relation if necessary
        $newHousing = null === $lodger ? null : $this;
        if ($lodger->getHousing() !== $newHousing) {
            $lodger->setHousing($newHousing);
        }

        return $this;
    }
}
