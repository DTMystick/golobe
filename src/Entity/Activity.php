<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameActivity = null;

    #[ORM\Column]
    private ?int $priceActivity = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Destination $Destination = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameActivity(): ?string
    {
        return $this->nameActivity;
    }

    public function setNameActivity(string $nameActivity): static
    {
        $this->nameActivity = $nameActivity;

        return $this;
    }

    public function getPriceActivity(): ?int
    {
        return $this->priceActivity;
    }

    public function setPriceActivity(int $priceActivity): static
    {
        $this->priceActivity = $priceActivity;

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->Destination;
    }

    public function setDestination(?Destination $Destination): static
    {
        $this->Destination = $Destination;

        return $this;
    }
}
