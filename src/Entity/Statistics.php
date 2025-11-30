<?php

namespace App\Entity;

use App\Repository\StatisticsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatisticsRepository::class)]
class Statistics
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $monthYear = null;

    #[ORM\Column]
    private ?int $totalRevenue = null;

    #[ORM\Column]
    private ?int $totalReservations = null;

    #[ORM\Column]
    private ?int $totalClients = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $occupancyRate = null;

    #[ORM\Column(nullable: true)]
    private ?array $topRooms = null;

    #[ORM\Column(nullable: true)]
    private ?array $topClients = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $generatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonthYear(): ?\DateTime
    {
        return $this->monthYear;
    }

    public function setMonthYear(\DateTime $monthYear): static
    {
        $this->monthYear = $monthYear;

        return $this;
    }

    public function getTotalRevenue(): ?int
    {
        return $this->totalRevenue;
    }

    public function setTotalRevenue(int $totalRevenue): static
    {
        $this->totalRevenue = $totalRevenue;

        return $this;
    }

    public function getTotalReservations(): ?int
    {
        return $this->totalReservations;
    }

    public function setTotalReservations(int $totalReservations): static
    {
        $this->totalReservations = $totalReservations;

        return $this;
    }

    public function getTotalClients(): ?int
    {
        return $this->totalClients;
    }

    public function setTotalClients(int $totalClients): static
    {
        $this->totalClients = $totalClients;

        return $this;
    }

    public function getOccupancyRate(): ?string
    {
        return $this->occupancyRate;
    }

    public function setOccupancyRate(string $occupancyRate): static
    {
        $this->occupancyRate = $occupancyRate;

        return $this;
    }

    public function getTopRooms(): ?array
    {
        return $this->topRooms;
    }

    public function setTopRooms(?array $topRooms): static
    {
        $this->topRooms = $topRooms;

        return $this;
    }

    public function getTopClients(): ?array
    {
        return $this->topClients;
    }

    public function setTopClients(?array $topClients): static
    {
        $this->topClients = $topClients;

        return $this;
    }

    public function getGeneratedAt(): ?\DateTime
    {
        return $this->generatedAt;
    }

    public function setGeneratedAt(\DateTime $generatedAt): static
    {
        $this->generatedAt = $generatedAt;

        return $this;
    }
}
