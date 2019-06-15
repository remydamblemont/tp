<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Type(type="integer", message="Merci de renseigner un nombre entier")
     */
    private $Seat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Kind")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $Kind;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BrandVehicule")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $Brand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ModelVehicule")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $Model;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorVehicule")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $Color;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeat(): ?int
    {
        return $this->Seat;
    }

    public function setSeat(int $Seat): self
    {
        $this->Seat = $Seat;

        return $this;
    }

    public function getKind(): ?Kind
    {
        return $this->Kind;
    }

    public function setKind(?Kind $Kind): self
    {
        $this->Kind = $Kind;

        return $this;
    }

    public function getBrand(): ?BrandVehicule
    {
        return $this->Brand;
    }

    public function setBrand(?BrandVehicule $Brand): self
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getModel(): ?ModelVehicule
    {
        return $this->Model;
    }

    public function setModel(?ModelVehicule $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getColor(): ?ColorVehicule
    {
        return $this->Color;
    }

    public function setColor(?ColorVehicule $Color): self
    {
        $this->Color = $Color;

        return $this;
    }
}
