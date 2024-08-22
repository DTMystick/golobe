<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM; // ORM annotations

#[ORM\Entity] // Entity definition
class Activity
{
    #[ORM\Id] // Primary key
    #[ORM\GeneratedValue] // Auto-increment
    #[ORM\Column(type: 'integer')] // Integer column
    private $id;

    #[ORM\Column(type: 'string', length: 255)] // String column, max length 255
    private $name;

    #[ORM\Column(type: 'decimal', scale: 2)] // Decimal column, 2 decimal places
    private $price;

    // Get ID
    public function getId(): ?int
    {
        return $this->id;
    }

    // Get Name
    public function getName(): ?string
    {
        return $this->name;
    }

    // Set Name
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    // Get Price
    public function getPrice(): ?float
    {
        return $this->price;
    }

    // Set Price
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }
}
