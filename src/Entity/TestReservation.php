<?php

namespace App\Entity;

use App\Repository\TestReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestReservationRepository::class)
 */
class TestReservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Vente::class, inversedBy="testReservations")
     */
    private $vente;

    /**
     * @ORM\Column(type="date")
     */
    private $dateReserve;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVente(): ?Vente
    {
        return $this->vente;
    }

    public function setVente(?Vente $vente): self
    {
        $this->vente = $vente;

        return $this;
    }

    public function getDateReserve(): ?\DateTimeInterface
    {
        return $this->dateReserve;
    }

    public function setDateReserve(\DateTimeInterface $dateReserve): self
    {
        $this->dateReserve = $dateReserve;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }
}
