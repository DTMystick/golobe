<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DestinationRepository::class)]
class Destination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameDestination = null;

    #[ORM\Column]
    private ?int $priceDestination = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Booking $Booking = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDestination(): ?string
    {
        return $this->nameDestination;
    }

    public function setNameDestination(string $nameDestination): static
    {
        $this->nameDestination = $nameDestination;

        return $this;
    }

    public function getPriceDestination(): ?int
    {
        return $this->priceDestination;
    }

    public function setPriceDestination(int $priceDestination): static
    {
        $this->priceDestination = $priceDestination;

        return $this;
    }

    public function getBooking(): ?Booking
    {
        return $this->Booking;
    }

    public function setBooking(?Booking $Booking): static
    {
        $this->Booking = $Booking;

        return $this;
    }
}
